@extends('layouts.master')
@section('content')
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>kategori Edit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('kategori.index') }}">kategori Data</a>
                    </li>
                    <li class="breadcrumb-item active">kategori Edit</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-12">
                <!-- general form elements -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Edit kategori</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputText">kategori</label>
                                <input
                                    type="text" 
                                    name="kategori"
                                    class="form-control @error('kategori') is-invalid @enderror"
                                    id="exampleInputText"
                                    value="{{$kategori->kategori}}"
                                    placeholder="Enter kategori">
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