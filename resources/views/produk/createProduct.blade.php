@extends('template.layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Create Product</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add product</h6>
            </div>
            <div class="card-body">
                <form action="/product" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="productNumber" class="form-label">Product Number</label>
                        <input type="text" class="@error('productNumber') is-invalid @enderror form-control" id="productNumber" name="productNumber" value="{{ old('productNumber') }}">
                        @error('productNumber')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="@error('productName') is-invalid @enderror form-control" id="productName" name="productName" value="{{ old('productName') }}">
                        @error('productName')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="unitId" class="form-label">Variant</label>
                        <select name="unitId" class="form-control form-select"  id="unitId">
                            @foreach ($unit as $item)
                                @if (old('unitId') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="basePrice" class="form-label">Base Price</label>
                        <input type="text" class="@error('basePrice') is-invalid @enderror form-control" id="basePrice" name="basePrice" value="{{ old('basePrice') }}">
                        @error('basePrice')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="sellingPrice" class="form-label">Selling Price</label>
                        <input type="text" class="@error('sellingPrice') is-invalid @enderror form-control" id="sellingPrice" name="sellingPrice" value="{{ old('sellingPrice') }}">
                        @error('sellingPrice')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="text" class="@error('stock') is-invalid @enderror form-control" id="stock" name="stock" value="{{ old('stock') }}">
                        @error('stock')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="supplierId" class="form-label">Supplier</label>
                        <select name="supplierId" class="form-control form-select"  id="supplierId">
                            @foreach ($supplier as $item)
                                @if (old('supplierId') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->companyName }}</option>
                                @else
                                <option value="{{ $item->id }}">{{ $item->companyName }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection
