@extends('template.layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Create Customer</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Customer</h6>
            </div>
            <div class="card-body">
                <form action="/customer" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="customerNumber" class="form-label">Customer Number</label>
                        <input type="text" class="@error('customerNumber') is-invalid @enderror form-control" id="customerNumber" name="customerNumber" value="{{ old('customerNumber') }}">
                        @error('customerNumber')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="customerName" class="form-label">Customer Name</label>
                        <input type="text" class="@error('customerName') is-invalid @enderror form-control" id="customerName" name="customerName" value="{{ old('customerName') }}">
                        @error('customerName')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="@error('address') is-invalid @enderror form-control" id="address" name="address" value="{{ old('address') }}">
                        @error('address')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="msisdn" class="form-label">No HP</label>
                        <input type="text" class="@error('msisdn') is-invalid @enderror form-control" id="msisdn" name="msisdn" value="{{ old('msisdn') }}">
                        @error('msisdn')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection
