@extends('layouts.template')

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data User</h3>

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    @if (auth()->user()->role == 1)
                        <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                            data-bs-target="#default">
                            Tambah Data User
                        </button>
                    @endif

                    <div class="mt-3">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                        <div class="dataTable-container">
                            <table class="table table-striped dataTable-table" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Nama Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <a data-bs-toggle="modal"
                                                    data-bs-target="#inlineFormUpdate{{ $item->id }}"
                                                    class="btn btn-outline-warning">
                                                    <i class="badge-circle badge-circle-white text-secondary font-medium-1"
                                                        data-feather="edit"></i>
                                                </a>
                                                @if (auth()->user()->role == 1)
                                                    @if ($item->id != auth()->user()->id)
                                                        <a data-bs-toggle="modal"
                                                            data-bs-target="#inlineFormDelete{{ $item->id }}"
                                                            class="btn btn-outline-danger">
                                                            <i class="badge-circle badge-circle-white text-secondary font-medium"
                                                                data-feather="trash-2"></i>
                                                        </a>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>


                                        {{-- modal update --}}
                                        <div class="modal fade text-left" id="inlineFormUpdate{{ $item->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel1">Ubah Data Ruangan</h5>
                                                        <button type="button" class="close rounded-pill"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-x">
                                                                <line x1="18" y1="6" x2="6"
                                                                    y2="18"></line>
                                                                <line x1="6" y1="6" x2="18"
                                                                    y2="18"></line>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('user/' . $item->id) }}" method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-12">

                                                                    <div class="form-group">
                                                                        <label for="basicInput">Name</label>
                                                                        <input type="text"
                                                                            class="form-control @error('name') is-invalid @enderror"
                                                                            id="basicInput" name="name"
                                                                            placeholder="Enter name"
                                                                            value="{{ old('name', $item->name) }}">
                                                                        @error('name')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="basicInput">Email</label>
                                                                        <input type="email"
                                                                            class="form-control @error('email') is-invalid @enderror"
                                                                            id="basicInput" name="email"
                                                                            placeholder="Enter Email"
                                                                            value="{{ old('email', $item->email) }}">
                                                                        @error('email')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="basicInput">Password</label>
                                                                        <input type="password"
                                                                            class="form-control @error('password') is-invalid @enderror"
                                                                            id="basicInput" name="password"
                                                                            placeholder="Enter Password"
                                                                            value="{{ old('password', $item->password) }}">
                                                                        @error('password')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="basicInput">Konfirmasi Password</label>
                                                                        <input type="password"
                                                                            class="form-control @error('konfirmasi_password') is-invalid @enderror"
                                                                            id="basicInput" name="password_confirmation"
                                                                            placeholder="Konfirmasi Password"
                                                                            value="{{ old('konfirmasi_password', $item->password) }}">
                                                                        @error('konfirmasi_password')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary ml-1"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Submit</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="modal fade text-left" id="inlineFormDelete{{ $item->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel1">Hapus Data Ruangan</h5>
                                                        <button type="button" class="close rounded-pill"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-x">
                                                                <line x1="18" y1="6" x2="6"
                                                                    y2="18"></line>
                                                                <line x1="6" y1="6" x2="18"
                                                                    y2="18"></line>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('user/' . $item->id) }}" method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <p>Are u sure user, name {{ $item->name }}
                                                                            Delete?</p>
                                                                    </div>


                                                                    <button type="submit" class="btn btn-primary ml-1"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Submit</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </section>
    </div>

    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Tambah Data Ruangan</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/user') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">Masukan Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Masukan Nama Lengkap">
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Masukan Email</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Masukan Email">
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="basicInput" name="password" placeholder="Enter Password"
                                        value="{{ old('password') }}">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Konfirmasi Password</label>
                                    <input type="password"
                                        class="form-control @error('konfirmasi_password') is-invalid @enderror"
                                        id="basicInput" name="password_confirmation" placeholder="Konfirmasi Password"
                                        value="{{ old('konfirmasi_password') }}">
                                    @error('konfirmasi_password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>




                                <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Submit</span>
                                </button>
                            </div>
                        </div>
                </div>
                </form>
            </div>

        </div>
    </div>
@endsection
