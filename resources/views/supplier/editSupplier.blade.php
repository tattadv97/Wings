@extends('template.layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Supplier</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Supplier</h6>
            </div>
            <div class="card-body">
                <form action="/supplier/{{ $supplier->id }}" method="POST">
                    @method('put')
                    @csrf

                    <div class="mb-3">
                        <label for="supplierNumber" class="form-label">Supplier Number</label>
                        <input type="text" class="@error('supplierNumber') is-invalid @enderror form-control" id="supplierNumber" name="supplierNumber" value="{{ old('supplierNumber', $supplier->supplierNumber) }}">
                        @error('supplierNumber')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="companyName" class="form-label">Company Name</label>
                        <input type="text" class="@error('companyName') is-invalid @enderror form-control" id="companyName" name="companyName" value="{{ old('companyName', $supplier->companyName) }}">
                        @error('companyName')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="@error('address') is-invalid @enderror form-control" id="address" name="address" value="{{ old('address', $supplier->address) }}">
                        @error('address')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="salesName" class="form-label">Sales Name</label>
                        <input type="text" class="@error('salesName') is-invalid @enderror form-control" id="salesName" name="salesName" value="{{ old('salesName', $supplier->salesName) }}">
                        @error('salesName')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="text" class="@error('phoneNumber') is-invalid @enderror form-control" id="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber', $supplier->phoneNumber) }}">
                        @error('phoneNumber')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="msisdnSales" class="form-label">No HP Sales</label>
                        <input type="text" class="@error('msisdnSales') is-invalid @enderror form-control" id="msisdnSales" name="msisdnSales" value="{{ old('msisdnSales', $supplier->msisdnSales) }}">
                        @error('msisdnSales')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Supplier</button>
                </form>
            </div>
        </div>
    </div>
@endsection
