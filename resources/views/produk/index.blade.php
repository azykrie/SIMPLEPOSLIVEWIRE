@extends('layouts.master')
@section('content')
    <section class = "content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Produk Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Produk Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class = "content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('produk.create') }}"> Create</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Stock</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($produk as $index => $item)
                                    <tbody>
                                        <tr>
                                            <td>{{ $index + $produk->firstItem() }}</td>
                                            <td>{{ $item->nama_produk }}</td>
                                            <td>{{ $item->kategori->kategori }}</td>
                                            <td>{{ $item->stock }}</td>
                                            <td>Rp. {{ number_format($item->harga) }}</td>
                                            <td>
                                                <form action="{{ route('produk.destroy', $item->id) }}" method="post">
                                                    <a class="btn btn-primary"
                                                        href="{{ route('produk.edit', $item->id) }}">Edit</a>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                        {{ $produk->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
