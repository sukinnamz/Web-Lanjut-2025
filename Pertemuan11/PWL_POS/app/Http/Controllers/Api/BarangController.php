<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return BarangModel::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'barang_kode' => 'required',
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);


        $barang = BarangModel::create([
            'barang_id' => $request->barang_id,
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'image' => $request->image->hashName(),
        ]);

        return response()->json($barang, 201);
    }

    public function show(BarangModel $barang)
    {
        return BarangModel::find($barang);
    }

    public function update(Request $request, BarangModel $barang)
    {
        $barang->update($request->all());
        return BarangModel::find($barang);
    }

    public function destroy(BarangModel $barang)
    {
        $barang->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}