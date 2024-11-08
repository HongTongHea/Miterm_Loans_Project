@extends('layouts.app')

@section('title' , 'Create Employee')

@section('app-content')
    <div class="card">
        <div class="card-header">
            <h1>Create Employee</h1>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('employees.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control " />
                        @error('first_name')
                            <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control " />
                        @error('last_name')
                            <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" class="form-select">
                            <option value="" style="display: none">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        @error('gender')
                            <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" name="phone" class="form-control " />

                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control " />
                    </div>
                    <div class="col-12 col-md-2 mb-3">
                        <div class="form-check">
                            <label for="active" class="form-label">Is Active</label>
                            <input type="checkbox" name="active" id="active" class="form-check-input">
                        </div>
                    </div>
                    <div class="col-12 col-md-12 mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea type="text" name="address" class="form-control "> </textarea>

                    </div>

                </div>
                <button  type="submit" class="btn btn-sm btn-danger mt-3">Create</button>
                <a href="{{ Route('employees.index') }}" class="btn btn-sm btn-primary mt-3">back</a></button>
            </form>
        </div>
    </div>
@endsection
