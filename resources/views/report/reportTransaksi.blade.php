@extends('template.layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Report</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pilih Periode</h6>
        </div>
        <div class="card-body">
            <form class="row gx-3 gy-2 align-items-center" action="{{ route('report.store') }}" method="POST">
                @csrf
                <div class="col-sm-3 mb-3">
                    <label for="tglAwal" class="form-label">Mulai Dari</label>
                    <input type="date" class="@error('tglAwal') is-invalid @enderror form-control" id="tglAwal" name="tglAwal" value="{{ old('tglAwal') }}">
                    @error('tglAwal')
                    <div class="invalidd-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-sm-3 mb-3">
                    <label for="tglAkhir" class="form-label">Sampai</label>
                    <input type="datetime-local" class="@error('tglAkhir') is-invalid @enderror form-control" id="tglAkhir" name="tglAkhir" value="{{ old('tglAkhir') }}">
                    @error('tglAkhir')
                    <div class="invalidd-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-sm-3 mb-3">
                    <label class="visually-hidden" for="product">Product</label>
                    <select name="product" class="form-control form-select" id="product" required>
                        <option value="all">All Prduct</option>
                        @if(isset($product))
                        @foreach ($product as $item)
                            @if (old('product') == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->productName }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->productName }}</option>
                            @endif
                        @endforeach
                        @endif
                    </select>
                </div>
                <button type="submit" class="ml-3 btn btn-primary">Generate Report</button>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        @if (isset($total))
        <div class="col-sm-3 mt-3">
            <label for="qty" class="form-label">QTY Terjual</label>
            <input type="text" class="form-control" id="qty" name="qty" value="{{ $total }}" readonly>
        </div>
        @endif
        <form class="row gx-3 gy-2 align-items-center" action="#" method="POST">
        @if (isset($turnover))
        <div class="col-sm-3 mt-3 ml-3">
            <label for="turnover" class="form-label">Omzet</label>
            <input type="text" class="form-control" id="turnover" name="turnover" value="{{ $turnover }}" readonly>
        </div>
        @endif
        @if (isset($profit))
        <div class="col-sm-3 mt-3">
            <label for="profit" class="form-label">Profit</label>
            <input type="text" class="form-control" id="profit" name="profit" value="{{ $profit }}" readonly>
        </div>
        @endif
        </form>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Report Transaction</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>No Invoice</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($trx))
                        @foreach ($trx as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->invoice }}</td>
                            <td>{{ $item->product->productName }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->subtotal }}</td>
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

