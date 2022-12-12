@extends('template.layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">New PO - {{ $po['purchaseNo'] }}</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Select Product</h6>
            </div>
            <div class="card-body">
                <form class="row gx-3 gy-2 align-items-center" action="{{ route('poDetail.store') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <input type="hidden" name="purchaseNo" value="{{ $po['purchaseNo'] }}">
                    <div class="col-sm-3">
                        <label class="visually-hidden" for="product">Produk</label>
                        <select name="product" class="form-control form-select" id="listProduct" onchange="selectProduct()" required>
                            <option value="">Pilih Produk</option>
                            @foreach ($product as $item)
                                @if (old('product') == $item->id)
                                    <option value="{{ $item->id }}" data-stock="{{ $item->stock }}" selected>{{ $item->productName }}</option>
                                @else
                                    <option value="{{ $item->id }}" data-stock="{{ $item->stock }}">{{ $item->productName }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <label class="visually-hidden" for="qty">Sisa Stock</label>
                        <input type="text" class="form-control" id="sisaStock" name="qty" readonly value="">
                    </div>
                    <div class="col-sm-1">
                        <label class="visually-hidden" for="qty">QTY</label>
                        <input type="number" class="form-control" id="qty" name="qty" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-outline-primary mt-4">Submit</button>
                    </div>
                    @if ($message = Session::get('message_error'))
                    <div class="alert alert-danger alert-block ml-5 mt-4">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                </form>
                <form action="{{ route('po.destroy', ['po' => $po->purchaseNo]) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger mt-3"
                        onclick="return confirm('Are You Sure??')" type="submit">Calcel</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Order</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('po.update', ['po' => $po->purchaseNo]) }}" method="POST" class="row gx-3 gy-2 align-items-center">
                    @method('PUT')
                    @csrf

                    <input type="hidden" name="mutasi" value="Pengeluaran">
                    <input type="hidden" name="type" value="PO">
                    <input type="hidden" name="nominal" value="{{ $subtotal }}">
                    <input type="hidden" name="keterangan" value="Purchase">
                    <div class="col-sm-3">
                        <label class="visually-hidden" for="supplierId">Supplier</label>
                        <select name="supplierId" class="form-control form-select" id="supplierId" required>
                            <option value="">Pilih Supplier</option>
                            @foreach ($supplier as $item)
                                @if (old('customer') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->companyName }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->companyName }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="totalPrice">Total Price</label>
                        <input type="text" class="form-control" id="totalPrice" name="totalPrice" value="{{ $subtotal }}" readonly>
                    </div>
                    <div class="col-sm-3 mt-3">
                        <button type="submit" class="btn btn-primary">Transaction</button>
                    </div>
                </form>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Sub Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($poDetails) > 0)
                                @foreach ($poDetails as $detail)
                                    <tr>
                                        <td>{{ $detail->product->productName }}</td>
                                        <td>Rp. {{ $detail->product->basePrice }}</td>
                                        <td>{{ $detail->qty }}</td>
                                        <td>Rp. {{ $detail->subtotal }}</td>
                                        <td>
                                            <form action="{{ route('poDetail.destroy', ['poDetail' => $detail->id]) }}" method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger"
                                                    onclick="return confirm('Are You Sure??')" type="submit">Delete</button>
                                            </form>
                                        </td>
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

@section('js')
<script>
    function selectProduct()
    {
        const el = document.getElementById('listProduct');
        const opt = el.options[el.selectedIndex];

        document.getElementById('sisaStock').value = opt.getAttribute('data-stock')
    }
</script>
@endsection
