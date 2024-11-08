@extends('layouts.app')

@section('title', 'Create New Loan')

@section('app-content')
    <div class="card">
        <div class="card-body">
            <h1>Create New Loan</h1>

            <form action="{{ route('loans.store') }}" method="POST">
                @csrf
        
                <!-- Customer ID -->
                <div class="form-group">
                    <label for="customer_id">Customer</label>
                    <select name="customer_id" id="customer_id" class="form-control" required>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                        @endforeach
                    </select>
                </div>
        
                <!-- Loan Amount -->
                <div class="form-group">
                    <label for="loan_amount">Loan Amount</label>
                    <input type="number" step="0.01" name="loan_amount" class="form-control" id="loan_amount" required>
                </div>
        
                <!-- Interest Rate -->
                <div class="form-group">
                    <label for="interest_rate">Interest Rate (%)</label>
                    <input type="number" step="0.01" name="interest_rate" class="form-control" id="interest_rate" required>
                </div>
        
                <!-- Loan Term -->
                <div class="form-group">
                    <label for="loan_term">Loan Term (months)</label>
                    <input type="number" name="loan_term" class="form-control" id="loan_term" required>
                </div>
        
                <!-- Start Date -->
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" class="form-control" id="start_date" required>
                </div>
        
                <!-- End Date -->
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" class="form-control" id="end_date" required>
                </div>
        
                <!-- Payment Type -->
                <div class="form-group">
                    <label for="payment_type">Payment Type</label>
                    <select name="payment_type" id="payment_type" class="form-control" required>
                        <option value="Monthly Installments">Monthly Installments</option>
                        <option value="Bi-Weekly Installments">Bi-Weekly Installments</option>
                        <option value="Weekly Installments">Weekly Installments</option>
                        <option value="One-Time Payment">One-Time Payment</option>
                    </select>
                </div>
        
                <button type="submit" class="btn btn-primary mt-3">Create Loan</button>
            </form>
        </div>
    </div>

@endsection
