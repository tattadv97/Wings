@extends('template.layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Create Unit Product</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Unit Product</h6>
            </div>
            <div class="card-body">
                <form action="/unit" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Unit Name</label>
                        <input type="text" class="@error('name') is-invalid @enderror form-control" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Add Unit Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection
