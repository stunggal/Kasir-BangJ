@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">General Form Elements</h5>

                        <!-- General Form Elements -->
                        <form method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
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
                                <label for="inputText" class="col-sm-2 col-form-label">Harga Beli</label>
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
                                <label for="inputText" class="col-sm-2 col-form-label">Harga Jual</label>
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
                                <label for="inputText" class="col-sm-2 col-form-label">Harga Grosir</label>
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
                                <label for="inputText" class="col-sm-2 col-form-label">Stok</label>
                                <div class="col-sm-10 input-group">
                                    <input type="number" class="form-control" name="stok" required
                                        value="{{ old('stok') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Satuan</label>
                                <div class="col-sm-10 input-group">
                                    <select class="form-select" aria-label="Default select example" name="satuan">
                                        <option selected disabled>Pilih Satuan</option>
                                        <option value="ecer">Ecer</option>
                                        <option value="grosir">Grosir</option>
                                        <option value="ecer_grosir">Ecer & Grosir</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10 input-group">
                                    <textarea class="form-control" style="height: 100px" name="keterangan">{{ old('keterangan') }}</textarea>
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Status</legend>
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

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
