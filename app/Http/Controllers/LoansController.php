<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Loan;
use App\Models\LoanSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $loans = Loan::all();
        return view('loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        return view('loans.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'loan_amount' => 'required|numeric',
            'interest_rate' => 'required|numeric',
            'loan_term' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'payment_type' => 'required|string',
        ]);

        $loan = Loan::create($request->all());

        // Generate the loan schedule
        $this->generateLoanSchedule($loan);

        return redirect()->route('loans.index')->with('success', 'Loan and schedule created successfully.');
    }

    private function generateLoanSchedule(Loan $loan)
    {
        $loanAmount = $loan->loan_amount;
        $annualInterestRate = $loan->interest_rate / 100;
        $loanTerm = $loan->loan_term;
        $balance = $loanAmount;
        $paymentDate = $loan->start_date;

        switch ($loan->payment_type) {
            case 'Monthly Installments':
                $periods = $loanTerm;
                $paymentInterval = '+1 month';
                $monthlyInterestRate = $annualInterestRate / 12;
                break;

            case 'Bi-Weekly Installments':
                $periods = $loanTerm * 2;
                $paymentInterval = '+2 weeks';
                $monthlyInterestRate = $annualInterestRate / 26;
                break;

            case 'Weekly Installments':
                $periods = $loanTerm * 4;
                $paymentInterval = '+1 week';
                $monthlyInterestRate = $annualInterestRate / 52;
                break;

            case 'One-Time Payment':
                $periods = 1;
                $paymentInterval = '+1 month';
                $monthlyInterestRate = 0;
                break;

            default:
                throw new \Exception("Invalid Payment Type");
        }

        if ($loan->payment_type !== 'One-Time Payment') {
            $paymentAmount = $loanAmount * $monthlyInterestRate / (1 - pow((1 + $monthlyInterestRate), -$periods));
        } else {
            $paymentAmount = $loanAmount * (1 + $annualInterestRate);
        }

        for ($i = 1; $i <= $periods; $i++) {
            $interestPaid = $balance * $monthlyInterestRate;
            $principalPaid = $paymentAmount - $interestPaid;
            $balance -= $principalPaid;

            LoanSchedule::create([
                'loan_id' => $loan->id,
                'payment_date' => $paymentDate,
                'payment_amount' => $paymentAmount,
                'principal_paid' => $principalPaid,
                'interest_paid' => $interestPaid,
                'balance' => $balance
            ]);

            $paymentDate = Carbon::parse($paymentDate)->add($paymentInterval);
        }
    }

    public function show($id)
    {
        $loan = Loan::with('schedules')->findOrFail($id);
        return view('loans.show', compact('loan'));
    }

    public function edit($id)
    {
        $customers = Customer::all();
        $loan = Loan::findOrFail($id); // Retrieve the loan by ID
        return view('loans.edit', compact('loan', 'customers')); // Pass the loan variable to the view
    }


    public function update(Request $request, Loan $loan)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'loan_amount' => 'required|numeric',
            'interest_rate' => 'required|numeric',
            'loan_term' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'payment_type' => 'required|string',
        ]);

        $loan->update($request->all());

        $loan->schedules()->delete();

        $this->generateLoanSchedule($loan);

        return redirect()->route('loans.index')->with('success', 'Loan updated successfully.');
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();
        return redirect()->route('loans.index')->with('success', 'Loan deleted successfully.');
    }
}
