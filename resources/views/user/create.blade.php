@extends('layouts.master') @section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('user.index') }}">User Data</a>
                        </li>
                        <li class="breadcrumb-item active">User Form</li>
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
                            <h3 class="card-title">Add User</h3>
                        </div>
                        <form action="{{ route('user.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputText">Nama</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" id="exampleInputText"
                                        placeholder="Masukan Nama">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Nama tidak boleh kosong</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="exampleInputText"
                                        placeholder="Masukan Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Email tidak boleh kosong</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="exampleInputText"
                                        placeholder="Masukan Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Password tidak boleh kosong</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Role</label>
                                    <select class="custom-select rounded-0" id="exampleSelectRounded0" name="role">
                                        <option value="">Pilih Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="kasir">Kasir</option>
                                    </select>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('user.index') }}" class="btn btn-dark">Return</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
