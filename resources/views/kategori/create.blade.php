@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>kategori Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('kategori.index') }}">kategori Data</a>
                        </li>
                        <li class="breadcrumb-item active">kategori Form</li>
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
                            <h3 class="card-title">Add kategori</h3>
                        </div>
                        <form action="{{ route('kategori.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputText">Kategori</label>
                                    <input type="text" name="kategori"
                                        class="form-control @error('kategori') is-invalid @enderror" id="exampleInputText"
                                        placeholder="Enter kategori">
                                    @error('kategori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Kategori tidak boleh kosong</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('kategori.index') }}" class="btn btn-dark">Return</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
