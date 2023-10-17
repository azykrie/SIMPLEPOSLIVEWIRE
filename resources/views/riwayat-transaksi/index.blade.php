@extends('layouts.master')
@section('content') 
<section class = "content-header" > 
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Riwayat Transaksi</h1>
        </div>
    </div>
</div>
</section> 
<section class = "content" > 
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <div class="pull-right">
                </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama produk</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        @foreach ($transaksiDetail as $index => $item)
                        <tbody>
                            <tr>
                                <td>{{ $index + $transaksiDetail->firstItem() }}</td>
                                <td>{{ $item->produk->nama_produk }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rp. {{ number_format($item->total) }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                {{ $transaksiDetail->links() }}
            </div>
        </div>
    </div>
</div>
</section>
@endsection