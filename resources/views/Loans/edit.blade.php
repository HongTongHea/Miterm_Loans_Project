@extends('layouts.app')

@section('title', 'Edit Loan')

@section('app-content')
    <div class="card">
        <div class="card-body">
            <h1>Edit Loan</h1>

            <form action="{{ route('loans.update', $loan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Customer ID -->
                <div class="form-group">
                    <label for="customer_id">Customer</label>
                    <select name="customer_id" id="customer_id" class="form-control" required>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}"
                                {{ old('customer_id', $loan->customer_id) == $customer->id ? 'selected' : '' }}>
                                {{ $customer->first_name }} {{ $customer->last_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Loan Amount -->
                <div class="form-group">
                    <label for="loan_amount">Loan Amount</label>
                    <input type="number" step="0.01" name="loan_amount" class="form-control" id="loan_amount"
                        value="{{ old('loan_amount', $loan->loan_amount) }}" required>
                </div>

                <!-- Interest Rate -->
                <div class="form-group">
                    <label for="interest_rate">Interest Rate (%)</label>
                    <input type="number" step="0.01" name="interest_rate" class="form-control" id="interest_rate"
                        value="{{ old('interest_rate', $loan->interest_rate) }}" required>
                </div>

                <!-- Loan Term -->
                <div class="form-group">
                    <label for="loan_term">Loan Term (months)</label>
                    <input type="number" name="loan_term" class="form-control" id="loan_term"
                        value="{{ old('loan_term', $loan->loan_term) }}" required>
                </div>

                <!-- Start Date -->
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" class="form-control" id="start_date"
                        value="{{ old('start_date', $loan->start_date) }}" required>
                </div>

                <!-- End Date -->
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" class="form-control" id="end_date"
                        value="{{ old('end_date', $loan->end_date) }}" required>
                </div>

                <!-- Payment Type -->
                <div class="form-group">
                    <label for="payment_type">Payment Type</label>
                    <select name="payment_type" id="payment_type" class="form-control" required>
                        <option value="Monthly Installments"
                            {{ old('payment_type', $loan->payment_type) == 'Monthly Installments' ? 'selected' : '' }}>
                            Monthly Installments</option>
                        <option value="Bi-Weekly Installments"
                            {{ old('payment_type', $loan->payment_type) == 'Bi-Weekly Installments' ? 'selected' : '' }}>
                            Bi-Weekly Installments</option>
                        <option value="Weekly Installments"
                            {{ old('payment_type', $loan->payment_type) == 'Weekly Installments' ? 'selected' : '' }}>
                            Weekly Installments</option>
                        <option value="One-Time Payment"
                            {{ old('payment_type', $loan->payment_type) == 'One-Time Payment' ? 'selected' : '' }}>One-Time
                            Payment</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Loan</button>
                <a href="{{ route('loans.index') }}" class="btn btn-secondary mt-3">Cancel</a>
            </form>
        </div>
    </div>
@endsection
