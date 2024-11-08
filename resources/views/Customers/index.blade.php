@extends('layouts.app')

@section('title', 'Customers')

@section('app-content')
    <div class="card">
        <div class="card-body">

            <h1>Customers</h1>
            <form action="" method="GET" class="mt-3">
                <div class="row justify-content-end me-2">
                    <div class="col-12 col-md-8">
                        <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm">Add Customer</a>
                    </div>
                    <div class="col-12 col-md-4 ">

                        <input type="search" name="search" id="searchInput" class="form-control"
                            placeholder="Search Customers">

                    </div>
                </div>
            </form>

            @if (session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif
            <table id="customerTable" class="table mt-3 table-responsive ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>F-Name</th>
                        <th>L-Name</th>
                        <th>Email</th>
                        <th>P-Number</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $customer->first_name }}</td>
                            <td>{{ $customer->last_name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone_number }}</td>
                            <td>{{ $customer->address }}</td>

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('customers.edit', ['customer' => $customer->id]) }}">Edit</a>
                                        </li>
                                        <li>

                                            <form action="{{ route('customers.delete', ['customer' => $customer->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"
                                                    onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                                            </form>

                                        </li>
                                    </ul>
                                </div>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>






@endsection
