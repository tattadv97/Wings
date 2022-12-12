@extends('template.layout')
@section('content')
<form id="generateTrx" action="{{ route('transaction.store') }}" method="post">
    @csrf()
</form>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Transaction</h6>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <div class="table-responsive mt-3">
                    <a href="javascript:;" onclick="document.getElementById('generateTrx').submit();" class="btn btn-primary mb-3">Transaction</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>Customer</th>
                                <th>Total Price</th>
                                <th>Payment Methode</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $item)
                            <tr>
                                <td>{{ $item->invoice }}</td>
                                <td>{{ $item->customer->customerName }}</td>
                                <td>Rp. {{ $item->totalPrice }}</td>
                                <td>{{ $item->paymentMethode }}</td>
                                <td>{{ $item->paymentStatus }}</td>
                                <td>
                                    <a href="{{ route('transaction.show', ['transaction' => $item->invoice]) }}" class="btn btn-success fa fa-copy" target="_blank"></a>
                                </td>
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
