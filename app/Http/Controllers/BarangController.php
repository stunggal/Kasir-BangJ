<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('barang.index', [
            'title' => 'Barang',
            'page' => 'Index',
            'baselink' => 'barang',
            'barangs' => barang::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create', [
            'title' => 'Barang',
            'page' => 'Create',
            'baselink' => 'barang',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama_barang' => 'required|unique:barangs|max:255',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'harga_grosir' => 'required|numeric',
            'stok' => 'required|numeric',
            'status' => 'required',
        ]);
        // return $validatedData;
        $validatedData['keterangan'] = $request->keterangan;

        barang::create($validatedData);

        return redirect('/barang')->with('success', 'Barang baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(barang $barang)
    {
        return view('barang.edit', [
            'title' => 'Barang',
            'page' => 'Edit',
            'baselink' => 'barang',
            'barang' => $barang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barang $barang)
    {
        $ischangerd = $request->nama_barang == $barang->nama_barang && $request->harga_beli == $barang->harga_beli && $request->harga_jual == $barang->harga_jual && $request->harga_grosir == $barang->harga_grosir && $request->stok == $barang->stok && $request->status == $barang->status && $request->keterangan == $barang->keterangan;
        if ($ischangerd) {
            return 'sama';
            return redirect('/barang')->with('warning', 'Tidak ada perubahan data!');
        } else {
            return 'beda';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang $barang)
    {
        //
    }
}
