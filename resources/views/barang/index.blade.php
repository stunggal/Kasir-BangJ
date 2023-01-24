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
                    <a href="/{{ $baselink }}/create" class="btn btn-primary">Tambah Barang</a>
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
                                            <th scope="col">Harga</th>
                                            <th scope="col">Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barangs as $barang)
                                            <tr>
                                                <th scope="row"><a
                                                        href="/{{ $baselink }}/edit/{{ $barang->id }}">#{{ $barang->id }}</a>
                                                </th>
                                                <td><a href="/{{ $baselink }}/edit/{{ $barang->id }}"
                                                        class="text-primary">{{ $barang->nama_barang }}</a></td>
                                                <td>Rp. {{ $barang->harga_jual }}</td>
                                                <td>{{ $barang->stok }}</td>
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
