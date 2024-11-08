@extends('layouts.app')

@section('title', 'Employee Details')

@section('app-content')
<div class="container mt-3">
    <div class="card rounded-0 mb-3 shadow offset-2 col-md-8">
        <div class="card-header">Employee Details</div>
        <div class="card-body">
            <dl class="row" style="border: 2px solid #eee;">
                <dt class="col-sm-2 " style="background-color:#eee;">First Name</dt>
                <dd class="col-sm-10">{{ $employee->first_name }}</dd>
                
                <dt class="col-sm-2 " style="background-color:#eee;">Last Name</dt>
                <dd class="col-sm-10">{{ $employee->last_name }}</dd>
                
                <dt class="col-sm-2 " style="background-color:#eee;">Gender</dt>
                <dd class="col-sm-10">{{ $employee->gender }}</dd>
                
                <dt class="col-sm-2 " style="background-color:#eee;">Phone</dt>
                <dd class="col-sm-10">{{ $employee->phone }}</dd>
                
                <dt class="col-sm-2 " style="background-color:#eee;">Email</dt>
                <dd class="col-sm-10">{{ $employee->email }}</dd>
                
                <dt class="col-sm-2 " style="background-color:#eee;">Status</dt>
                <dd class="col-sm-10">
                    <input disabled type="checkbox" {{ $employee->active == 1 ? 'checked' : '' }} />
                </dd>
                
                <dt class="col-sm-2 " style="background-color:#eee;">Address</dt>
                <dd class="col-sm-10">{{ $employee->address }}</dd>
            </dl>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary ms-2 btn-sm" href="{{ route('employees.edit', ['id' => $employee->id]) }}">
                <i class="bi bi-pencil-square"></i> Edit
            </a>
            <a class="btn btn-secondary ms-2 btn-sm" href="{{ route('employees.index') }}">Back</a>
        </div>
    </div>
</div>

@endsection
