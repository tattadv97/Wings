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
            <form class="row gx-3 gy-2 align-items-center" action="{{ route('reportOperational.store') }}" method="POST">
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
                    <label class="visually-hidden" for="type">Type</label>
                    <select name="type" class="form-control form-select" id="type" required>
                        <option value="all">-- All Type --</option>
                        <option value="Transaksi">Transaksi</option>
                        <option value="PO">PO</option>
                        <option value="Operational">Operational</option>
                        <option value="Sponsorship">Sponsorship</option>
                        <option value="Other">Other</option>
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
        @if (isset($nominal))
        <div class="col-sm-3 mt-3">
            <label for="qty" class="form-label">Nominal</label>
            <input type="text" class="form-label" id="qty" name="qty" value="{{ $nominal }}" readonly>
        </div>
        @endif
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Report Transaction</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Mutasi</th>
                            <th>Type</th>
                            <th>Nominal</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($opr))
                        @foreach ($opr as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->mutasi }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->nominal }}</td>
                            <td>{{ $item->keterangan }}</td>
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

