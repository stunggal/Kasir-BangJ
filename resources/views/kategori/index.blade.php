@extends('layouts.main')

@section('content')
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            {{-- flash message --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            {{-- button for create barang --}}
            <div class="mb-2">
                <div class="mr-2">
                    <a href="/{{ $baselink }}/create" class="btn btn-primary">Tambah Kategori</a>
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
                                            <th scope="col">id</th>
                                            <th scope="col">Nama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategoris as $kategori)
                                            <tr>
                                                <th scope="row"><a
                                                        href="/{{ $baselink }}/edit/{{ $kategori->id }}">{{ $kategori->id }}</a>
                                                </th>
                                                <td>{{ $kategori->nama_kategori }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>
@endsection
