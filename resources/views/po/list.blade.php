@extends('template.layout')
@section('content')
<form id="generatePo" action="{{ route('po.store') }}" method="POST">
    @csrf()
</form>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Purchase</h6>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <div class="table-responsive mt-3">
                    <a href="javascript:;" onclick="document.getElementById('generatePo').submit();" class="btn btn-primary mb-3">Purchase</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Po Number</th>
                                <th>Supplier</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($po as $item)
                            <tr>
                                <td>{{ $item->purchaseNo }}</td>
                                <td>{{ $item->supplier->companyName }}</td>
                                <td>{{ $item->totalPrice }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
