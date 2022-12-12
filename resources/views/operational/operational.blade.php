@extends('template.layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Keuangan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Keuangan</h6>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-sm">
                <label for="uangMasuk" id="uangMasuk">Uang Masuk</label>
                <input type="text" class="form-control" name="uangMasuk" value="{{ $uangMasuk }}" readonly>
                </div>
                <div class="col-sm">
                <label for="uangKeluar" id="uangKeluar">Uang Keluar</label>
                <input type="text" class="form-control" name="uangKeluar" value="{{ $uangKeluar }}" readonly>
                </div>
                <div class="col-sm">
                <label for="totalSaldo" id="totalSaldo">Total Saldo</label>
                <input type="text" class="form-control" name="totalSaldo" value="{{ $uangMasuk - $uangKeluar }}" readonly>
                </div>
            </div>
            <div class="col-sm3 mb-4 mt-3">
                <a href="{{ route('operational.create') }}" class="btn btn-success">Operational</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mutasi</th>
                            <th>Type</th>
                            <th>Nominal</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($operational as $item)
                        <tr>
                            <td>{{ $item->mutasi }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->nominal }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                                <form action="{{ route('operational.destroy', ['operational' => $item->id]) }}" method="POST" class="d-inline">
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
