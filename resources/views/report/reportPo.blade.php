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
                <button type="submit" class="ml-3 btn btn-primary">Generate Report</button>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Report PO</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>No PO</th>
                            <th>Supplier</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($trx))
                        @foreach ($trx as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->invoice }}</td>
                            <td>{{ $item->supplier->companyName }}</td>
                            <td>{{ $item->totalPrice }}</td>
                            <td></td>
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
