@extends('layouts.app')
@section('tile', 'Delete')
@section('app-content')
    <div class="card">
        <div class="card-header">Delete?</div>
        <div class="card-body">
            <div class="alert alert-danger">
                <strong>Do you want to delete Employee # {{ $employee->id }}?</strong>
            </div>
        </div>
        <div class="card-footer">
            <form action="{{ route('employee.destroy', ['id' => $employee->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">
                    <i class="bi bi-person-dash"></i>
                    Delete
                </button>
                <a class="link-active" href="{{ route('employee.index') }}">Back</a>
            </form>
        </div>
    </div>
@endsection
