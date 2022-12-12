@extends('template.layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">OPERATIONAL</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Operational</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('operational.store') }}" method="POST">
                    @csrf
                    <div class="col-sm-4 mb-3">
                        <label for="mutasi" id="mutasi" class="form-label">Mutasi</label>
                        <select class="form-control form-select" name="mutasi" id="mutasi">
                            <option selected>-- Choose Mutasi --</option>
                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="type" id="type" class="form-label">Type</label>
                        <select class="form-control form-select" name="type" id="type">
                            <option selected>-- Choose Type --</option>
                            <option value="Transaksi">Transaksi</option>
                            <option value="PO">PO</option>
                            <option value="Operational">Operational</option>
                            <option value="Sponsorship">Sponsorship</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="nominal" class="form-label">Nominal</label>
                        <input type="Number" class="@error('nominal') is-invalid @enderror form-control" id="nominal" name="nominal" value="{{ old('nominal') }}">
                        @error('nominal')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="@error('keterangan') is-invalid @enderror form-control" id="keterangan" name="keterangan" value="{{ old('keterangan') }}">
                        @error('keterangan')
                        <div class="invalidd-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="ml-3 btn btn-primary">Add Operational</button>
                </form>
            </div>
        </div>
    </div>
@endsection
