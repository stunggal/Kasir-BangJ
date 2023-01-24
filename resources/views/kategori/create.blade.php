@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create {{ $title }}</h5>

                        <!-- General Form Elements -->
                        <form method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control @if ($errors->has('nama_kategori')) is-invalid @endif"
                                        name="nama_kategori" value="{{ old('nama_kategori') }}" placeholder="Kategori"
                                        required>
                                    {{-- error code --}}
                                    @if ($errors->has('nama_kategori'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nama_kategori') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

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
