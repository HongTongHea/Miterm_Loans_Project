<!-- resources/views/loans/show.blade.php -->
@extends('layouts.app')

@section('title', 'Loan Details')

@section('app-content')
    <div class="card rounded-0 ">
        <div class="card-body">
            <h1>Loan Details</h1>
            <table class="table table-sm table-hover table-responsive border">
                <tr>
                    <th>Loan ID:</th>
                    <td>{{ $loan->id }}</td>
                </tr>
                <tr>
                    <th>Customer:</th>
                    <td>{{ $loan->customer->first_name }} {{ $loan->customer->last_name }} </td>
                </tr>
                <tr>
                    <th>Loan Amount:</th>
                    <td>{{ $loan->loan_amount }}</td>
                </tr>
                <tr>
                    <th>Interest Rate:</th>
                    <td>{{ $loan->interest_rate }}%</td>
                </tr>
                <tr>
                    <th>Loan Term:</th>
                    <td>{{ $loan->loan_term }} months</td>
                </tr>
                <tr>
                    <th>Start Date:</th>
                    <td>{{ $loan->start_date }}</td>
                </tr>
                <tr>
                    <th>End Date:</th>
                    <td>{{ $loan->end_date }}</td>
                </tr>
                <tr>
                    <th>Payment Type:</th>
                    <td>{{ $loan->payment_type }}</td>
                </tr>
            </table>

            <h2>Payment Schedule</h2>
            <table class="table table-sm table-hover table-responsive border">
                <thead>
                    <tr>
                        <th>Payment Date</th>
                        <th>Payment Amount</th>
                        <th>Principal Paid</th>
                        <th>Interest Paid</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loan->schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->payment_date }}</td>
                            <td>{{ $schedule->payment_amount }}</td>
                            <td>{{ $schedule->principal_paid }}</td>
                            <td>{{ $schedule->interest_paid }}</td>
                            <td>{{ $schedule->balance }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('loans.index') }}" class="btn btn-secondary btn-sm">Back to Loans</a>
        </div>
    </div>
@endsection
