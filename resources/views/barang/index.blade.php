@extends('layouts.main')

@section('content')
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            {{-- button for create barang --}}
            <div class="mb-2">
                <div class="mr-2">
                    {{-- <a href="/{{ $baselink }}/create" class="btn btn-primary">Tambah Barang</a> --}}
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                        Tambah Barang
                    </button>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title">Barang <span>| Sedia</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Harga Jual</th>
                                            <th scope="col">Harga Grosir</th>
                                            <th scope="col">Stok</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($barangs as $barang)
                                            <tr>
                                                <th scope="row"><a
                                                        href="/{{ $baselink }}/edit/{{ $barang->id }}">#{{ $no }}</a>
                                                </th>
                                                <td class="text-primary">{{ $barang->nama_barang }}</td>
                                                <td>Rp. {{ $barang->harga_jual }}</td>
                                                <td>Rp. {{ $barang->harga_grosir }}</td>
                                                <td>{{ $barang->stok }}</td>
                                                @switch($barang->status)
                                                    @case('ready')
                                                        <td><span class="badge bg-success">Sedia</span></td>
                                                    @break

                                                    @case('low')
                                                        <td><span class="badge bg-warning">Hampir Habis</span></td>
                                                    @break

                                                    @case('empty')
                                                        <td><span class="badge bg-danger">Habis</span></td>
                                                    @break

                                                    @default
                                                        <td><span class="badge bg-dark">Not set</span></td>
                                                @endswitch
                                                <td>
                                                    {{-- only logo --}}
                                                    <a href="/{{ $baselink }}/edit/{{ $barang->id }}"
                                                        class="btn btn-sm btn-warning"><i class="ri-pencil-line"></i></a>
                                                    <form action="/{{ $baselink }}/{{ $barang->id }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                            <i class="ri-delete-bin-5-line"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                            @php
                                                $no++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->

        </div>

        <!-- Basic Modal -->
        <div class="modal fade" id="basicModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- General Form Elements -->
                    <form method="post" action="/barang/create">
                        <div class="modal-body">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Nama</label>
                                <div class="col-sm-10 input-group">
                                    <input type="text"
                                        class="form-control @if ($errors->has('nama_barang')) is-invalid @endif"
                                        value="@if (old('nama_barang')) {{ old('nama_barang') }} @endif"
                                        name="nama_barang" required>
                                    {{-- error code --}}
                                    @if ($errors->has('nama_barang'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nama_barang') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Harga Beli</label>
                                <div class="col-sm-10 input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">Rp. </span>
                                    <input type="number"
                                        class="form-control @if ($errors->has('harga_beli')) is-invalid @endif"
                                        value="{{ old('harga_beli') }}" name="harga_beli" required>
                                    {{-- error code --}}
                                    @if ($errors->has('harga_beli'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('harga_beli') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Harga Jual</label>
                                <div class="col-sm-10 input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">Rp. </span>
                                    <input type="number"
                                        class="form-control @if ($errors->has('harga_jual')) is-invalid @endif"
                                        value="{{ old('harga_jual') }}" name="harga_jual" required>
                                    {{-- error code --}}
                                    @if ($errors->has('harga_jual'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('harga_jual') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Harga Grosir</label>
                                <div class="col-sm-10 input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">Rp. </span>
                                    <input type="number"
                                        class="form-control @if ($errors->has('harga_grosir')) is-invalid @endif"
                                        value="{{ old('harga_grosir') }}" name="harga_grosir" required>
                                    {{-- error code --}}
                                    @if ($errors->has('harga_grosir'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('harga_grosir') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Stok</label>
                                <div class="col-sm-10 input-group">
                                    <input type="number" class="form-control" name="stok" required
                                        value="{{ old('stok') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-12 col-form-label">Satuan</label>
                                <div class="col-sm-10 input-group">
                                    <select class="form-select" aria-label="Default select example" name="satuan"
                                        required>
                                        <option selected disabled value="">Pilih Satuan</option>
                                        <option value="ecer">Ecer</option>
                                        <option value="grosir">Grosir</option>
                                        <option value="ecer_grosir">Ecer & Grosir</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-12 col-form-label">Keterangan</label>
                                <div class="col-sm-10 input-group">
                                    <textarea class="form-control" style="height: 100px" name="keterangan">{{ old('keterangan') }}</textarea>
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-12 pt-0">Status</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="gridRadios1"
                                            value="ready" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            Sedia
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="gridRadios2"
                                            value="low">
                                        <label class="form-check-label" for="gridRadios2">
                                            Hampir Habis
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="gridRadios3"
                                            value="empty">
                                        <label class="form-check-label" for="gridRadios3">
                                            Habis
                                        </label>
                                    </div>
                                </div>
                            </fieldset>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </form><!-- End General Form Elements -->
                </div>
            </div>
        </div><!-- End Basic Modal-->
    </section>
@endsection
