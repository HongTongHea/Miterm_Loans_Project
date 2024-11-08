@extends('layouts.app')
@section('title', 'Add New Customer')

@section('app-content')
    <div class="container mt-5">
        <h1>Add New Customer</h1>
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 col-md-4 mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" required>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" required>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" id="phone_number">
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="address">
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" name="city" class="form-control" id="city">
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="state" class="form-label">State</label>
                    <input type="text" name="state" class="form-control" id="state">
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input type="text" name="postal_code" class="form-control" id="postal_code">
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" name="country" class="form-control" id="country" value="Unknown">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Customer</button>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>

@endsection
