@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Produk Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('produk.index') }}">Produk Data</a>
                        </li>
                        <li class="breadcrumb-item active">Produk Form</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Add Item</h3>
                        </div>
                        <form action="{{ route('produk.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputText">Nama produk</label>
                                    <input type="text" name="nama_produk"
                                        class="form-control @error('nama_produk') is-invalid @enderror"
                                        id="exampleInputText" placeholder="Enter Nama produk">
                                    @error('nama_produk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Nama produk tidak boleh kosong</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">kategori</label>
                                    <select class="custom-select rounded-0 @error('kategori') is-invalid @enderror"
                                        id="exampleSelectRounded0" name="id_kategori">
                                        <option value="">Pilih kategori</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">Harga</label>
                                    <input type="number" name="harga"
                                        class="form-control @error('harga') is-invalid @enderror" id="exampleInputText"
                                        placeholder="Enter kategori">
                                    @error('harga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Harga tidak boleh kosong</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">Stock</label>
                                    <input type="number" name="stock"
                                        class="form-control @error('stock') is-invalid @enderror" id="exampleInputText"
                                        placeholder="Enter kategori">
                                    @error('stock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Stock tidak boleh kosong</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('produk.index') }}" class="btn btn-dark">Return</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
