@extends('layouts.app')

@section('title', 'Loans')

@section('app-content')
    <div class="card rounded-0">
        <div class="card-body">
            <h1>Loans</h1>
            <a href="{{ route('loans.create') }}" class="btn btn-primary btn-sm mb-3">Add New Loan</a>
            <table class="table table-sm table-hover table-responsive border">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>L_Amount</th>
                        <th>Interest Rate</th>
                        <th>L_Term</th>
                        <th>S_Date</th>
                        <th>E_Date</th>
                        <th>Payment Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loans as $loan)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $loan->customer->first_name }}{{ $loan->customer->last_name }}</td> <!-- Assuming customer_id is the B-ID -->
                            <td>{{ $loan->loan_amount }}</td>
                            <td>{{ $loan->interest_rate }}%</td>
                            <td>{{ $loan->loan_term }} months</td>
                            <td>{{ $loan->start_date }}</td>
                            <td>{{ $loan->end_date }}</td>
                            <td>{{ $loan->payment_type }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle btn-sm" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('loans.show', $loan->id) }}" class="dropdown-item">View
                                                Loan</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('loans.edit', $loan->id) }}" class="dropdown-item">Edit</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('loans.destroy', $loan->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">Delete</button>
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
