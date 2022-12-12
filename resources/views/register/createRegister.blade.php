@extends('template.layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Create User</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add User</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('register.store') }}" method="POST">
                    @csrf
                    <div class="mb-3 col-sm-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="@error('name') is-invalid @enderror form-control" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-sm-4">
                        <label for="username" class="form-label">username</label>
                        <input type="text" class="@error('username') is-invalid @enderror form-control" id="username" name="username" value="{{ old('username') }}">
                        @error('username')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="text" class="@error('password') is-invalid @enderror form-control" id="password" name="password" value="{{ old('password') }}">
                        @error('password')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="role" id="role" class="form-label">Role</label>
                        <select class="form-control form-select" name="role" id="role">
                            <option selected>-- Choose Role --</option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>
    </div>
@endsection
