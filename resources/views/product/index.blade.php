@extends('layouts.template')

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Produk</h3>

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Produk</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                        data-bs-target="#default">
                        Tambah Data Produk
                    </button>

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
                                        <th>Produk</th>
                                        <th>Klasifikasi</th>
                                        <th>Ruangan</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                
                                                @if ($item->clasification->name == 'Baik')
                                                    <span class="badge bg-success">Baik</span>
                                                @elseif ($item->clasification->name == 'Rusak Ringan')
                                                    <span class="badge bg-warning">Rusak Ringan</span>
                                                @else
                                                    <span class="badge bg-danger">Rusak Berat</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->room->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>
                                                <button data-bs-toggle="modal"
                                                    data-bs-target="#inlineFormUpdate{{ $item->id }}">
                                                    <i class="badge-circle badge-circle-white text-secondary font-medium"
                                                        data-feather="edit"></i>
                                                </button>
                                                <button data-bs-toggle="modal"
                                                    data-bs-target="#inlineFormDelete{{ $item->id }}">
                                                    <i class="badge-circle badge-circle-white text-danger font-medium"
                                                        data-feather="trash-2"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        {{-- modal update --}}
                                        <div class="modal fade text-left" id="inlineFormUpdate{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel1">Ubah Data Produk</h5>
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
                                                        <form action="{{ url('product/'.$item->id) }}" method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="basicInput">Masukan Produk</label>
                                                                        <input type="text" class="form-control"
                                                                            name="name"
                                                                            value="{{ old('name', $item->name) }}">
                                                                    </div>

                                                                </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="basicInput">Ruangan</label>
                                                                            <select class="choices form-select" name="room_id" value="{{ old('room_id') }}">
                                                                                <option value="" hidden>-- choose --</option>
                                                                                @foreach ($room as $row)
                                                                                    @if ($row->id == $item->room_id)
                                                                                        <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                                                                                    @else
                                                                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                                                    @endif
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="basicInput">Klasifikasi</label>
                                                                            <select class="choices form-select" name="clasification_id" value="{{ old('clasification_id') }}">
                                                                                <option value="" hidden>-- choose --</option>
                                                                                @foreach ($clasification as $row)
                                                                                    @if ($row->id == $item->clasification_id)
                                                                                        <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                                                                                    @else
                                                                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                                                    @endif
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="basicInput">Masukan Jumlah Produk</label>
                                                                            <input type="text" class="form-control" name="quantity"
                                                                               value="{{ old('quantity', $item->quantity) }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group mb-3">
                                                                            <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                                                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="10">{{ old('desc', $item->desc)  }}</textarea>
                                                                        </div>
                                                                    </div>


                                                                    <button type="submit" class="btn btn-primary ml-1"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Submit</span>
                                                                    </button>
                                                               
                                                            </div>
                                                    </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>

                                        {{-- modal delete --}}
                                        <div class="modal fade text-left" id="inlineFormDelete{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel1">Hapus Data Produk</h5>
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
                                                        <form action="{{ url('product/'.$item->id) }}" method="POST">
                                                            @method('delete')
                                                            @csrf
                                                           

                                                            <div class="mb-3">
                                                                <p>Are u sure room, name {{ $item->name }} Delete?</p>
                                                            </div> 
                                                                    <button type="submit" class="btn btn-primary ml-1"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Submit</span>
                                                                    </button>
                                                               
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
                    <h5 class="modal-title" id="myModalLabel1">Tambah Data Produk</h5>
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
                    <form action="{{ url('/product') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">Masukan Nama Product</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Masukan Nama Product">
                                </div>
                            </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Ruangan</label>
                                        <select class="choices form-select" name="room_id" value="{{ old('room_id')  }}">
                                            <option value="" hidden>-- choose --</option>
                                            @foreach ($room as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Klasifikasi</label>
                                        <select class="choices form-select" name="clasification_id" value="{{ old('clasification_id')  }}">
                                            <option value="" hidden>-- choose --</option>
                                            @foreach ($clasification as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="basicInput">Masukan Jumlah Produk</label>
                                        <input type="text" class="form-control" name="quantity"
                                            placeholder="Masukan Jumlah Produk">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="10"></textarea>
                                    </div>
                                </div>
                        </div> 

                                <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Submit</span>
                                </button>
                            
                        </div>
                </div>
                </form>
            </div>

        </div>
    </div>
    </div>
@endsection
