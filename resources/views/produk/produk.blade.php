@extends('template.layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables Product</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Product</h6>
        </div>
        <div class="card-body">
            <a href="/product/create" class="btn btn-primary mb-3">Add Product</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Product Number</th>
                            <th>Product Name</th>
                            <th>Variant</th>
                            <th>Base Price</th>
                            <th>Selling Price</th>
                            <th>Stock</th>
                            <th>Supplier</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products  as $item)
                        <tr>
                            <td>{{ $item->productNumber }}</td>
                            <td>{{ $item->productName }}</td>
                            <td>{{ $item->unit->name }}</td>
                            <td>{{ $item->basePrice }}</td>
                            <td>{{ $item->sellingPrice }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->supplier->companyName }}</td>
                            <td>
                                <a href="/product/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                <form action="/product/{{ $item->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('Are You Sure??')">Delete</button>
                                </form>
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

