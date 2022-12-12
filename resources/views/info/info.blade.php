@extends('template.layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Stock</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pilih Supplier</h6>
        </div>
        <div class="card-body">
            <form class="row gx-3 gy-2 align-items-center" action="{{ route('info.store') }}" method="POST">
                @csrf
                <div class="mb-3 col-sm-4">
                    <label for="supplierId" class="form-label">Supplier</label>
                    <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" name="supplierId" class="form-control form-select"  id="supplierId">
                        <option value="" >Filter Supplier</option>
                        @foreach ($supplier as $item)
                        <option value="/info/{{ $item->id }}/edit">{{ $item->companyName }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Stock</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Stock</th>
                            <th>Supplier</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($trx))
                        @foreach ($trx as $item)
                        <tr>
                            <td>{{ $item->productName }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->supplier->companyName }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

