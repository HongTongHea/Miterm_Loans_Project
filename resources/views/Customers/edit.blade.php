@extends('layouts.app')

@section('title', 'Edit Customer')

@section('app-content')
    <div class="card">
        <div class="card-body">

            <h1>Edit Customer</h1>
            <form action="{{ route('customers.update', ['customer' => $customer->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-md-4 mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="first_name"
                            value="{{ $customer->first_name }}" required>
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name"
                            value="{{ $customer->last_name }}" required>
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                            value="{{ $customer->email }}" required>
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" id="phone_number"
                            value="{{ $customer->phone_number }}">
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="address"
                            value="{{ $customer->address }}">
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" class="form-control" id="city"
                            value="{{ $customer->city }}">
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" name="state" class="form-control" id="state"
                            value="{{ $customer->state }}">
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <label for="postal_code" class="form-label">Postal Code</label>
                        <input type="text" name="postal_code" class="form-control" id="postal_code"
                            value="{{ $customer->postal_code }}">
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" name="country" class="form-control" id="country"
                            value="{{ $customer->country }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Customer</button>
                <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
            </form>

        </div>
    </div>
@endsection
