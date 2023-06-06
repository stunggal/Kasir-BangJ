@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">General Form Elements</h5>

                        <!-- General Form Elements -->
                        <form action="/barang/edit/{{ $barang->id }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama Barang*</label>
                                <div class="col-sm-10">
                                    <input name="nama_barang" type="text" required class="form-control"
                                        value="{{ $barang->nama_barang }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Harga Beli*</label>
                                <div class="col-sm-10">
                                    <input name="harga_beli" type="number" min="1" required class="form-control"
                                        value="{{ $barang->harga_beli }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Harga Jual*</label>
                                <div class="col-sm-10">
                                    <input name="harga_jual" type="number" min="1" required class="form-control"
                                        value="{{ $barang->harga_jual }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Harga Grosir*</label>
                                <div class="col-sm-10">
                                    <input name="harga_grosir" type="number" min="1" required class="form-control"
                                        value="{{ $barang->harga_beli }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Stok*</label>
                                <div class="col-sm-10">
                                    <input name="stok" type="number" min="1" required class="form-control"
                                        value="{{ $barang->stok }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" style="height: 100px" name="keterangan">{{ $barang->keterangan }}</textarea>
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Status*</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="gridRadios1"
                                            value="ready" @if ($barang->status == 'ready') checked @endif>
                                        <label class="form-check-label" for="gridRadios1">
                                            Sedia
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="gridRadios2"
                                            value="low"@if ($barang->status == 'low') checked @endif>
                                        <label class="form-check-label" for="gridRadios2">
                                            Menipis
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="status" id="gridRadios3"
                                            value="empty"@if ($barang->status == 'empty') checked @endif>
                                        <label class="form-check-label" for="gridRadios3">
                                            Habis
                                        </label>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"> </label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update data</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection
