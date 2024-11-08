@extends('layouts.app')



@section('app-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>Employees</h1>
                    <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm">Create New Emplyoee</a>
                    <table class="table table-responsive table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>F-Name</th>
                                <th>L-Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->gender }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->address }}</td>
                                    <td>
                                        <input disabled type="checkbox" name="" id=""
                                            {{ $employee->active ? 'checked' : '' }}>

                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu p-3">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('employees.edit', ['id' => $employee->id]) }}">Edit</a>
                                                </li>
                                                <li>
                                                    {{-- 
                                                        href="{{ route('employees.details', ['id' => $employee->id]) }}"></a> --}}
                                                    <a class="dropdown-item"
                                                        href="{{ route('employees.details', ['id' => $employee->id]) }}">
                                                        <i class="bi bi-pencil-square"></i> Details
                                                    </a>
                                                </li>
                                                <li>
                                                    <form
                                                        action="{{ route('employees.destroy', ['id' => $employee->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item" type="submit"
                                                            onclick="return confirm('Are you sure?')">Delete</button>
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
        </div>
    </div>
@endsection
