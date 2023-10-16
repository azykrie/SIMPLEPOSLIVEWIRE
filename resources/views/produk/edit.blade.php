@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Item Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('produk.index') }}">Item Data</a>
                        </li>
                        <li class="breadcrumb-item active">Item Form</li>
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
                        <form action="{{ route('produk.update', $produk->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputText">Name</label>
                                    <input type="text" value="{{ $produk->nama_produk }}" name="nama_produk"
                                        class="form-control @error('kategori') is-invalid @enderror" id="exampleInputText"
                                        placeholder="Enter kategori">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">kategori</label>
                                    <select class="custom-select rounded-0 @error('kategori') is-invalid @enderror"
                                        id="exampleSelectRounded0" name="id_kategori">
                                        <option value="{{ $produk->id_kategori }}">{{ $produk->kategori->kategori }}
                                        </option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">Price</label>
                                    <input type="number" name="harga" value="{{ $produk->harga }}"
                                        class="form-control @error('kategori') is-invalid @enderror" id="exampleInputText"
                                        placeholder="Enter kategori">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">Stock</label>
                                    <input type="number" name="stock" value="{{ $produk->stock }}"
                                        class="form-control @error('kategori') is-invalid @enderror" id="exampleInputText"
                                        placeholder="Enter kategori">
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
