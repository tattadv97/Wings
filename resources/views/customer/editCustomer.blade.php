@extends('template.layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Customer</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Customer</h6>
            </div>
            <div class="card-body">
                <form action="/customer/{{ $customer->id }}" method="POST">
                    @method('put')
                    @csrf

                    <div class="mb-3">
                        <label for="customerNumber" class="form-label">Customer Number</label>
                        <input type="text" class="@error('customerNumber') is-invalid @enderror form-control" id="customerNumber" name="customerNumber" value="{{ old('customerNumber', $customer->customerNumber) }}">
                        @error('customerNumber')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="customerName" class="form-label">Customer Name</label>
                        <input type="text" class="@error('customerName') is-invalid @enderror form-control" id="customerName" name="customerName" value="{{ old('customerName', $customer->customerName) }}">
                        @error('customerName')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="@error('address') is-invalid @enderror form-control" id="address" name="address" value="{{ old('address', $customer->address) }}">
                        @error('address')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="msisdn" class="form-label">Selling Price</label>
                        <input type="text" class="@error('msisdn') is-invalid @enderror form-control" id="msisdn" name="msisdn" value="{{ old('msisdn', $customer->msisdn) }}">
                        @error('msisdn')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Edit Customer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
