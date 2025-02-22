<?php

namespace App\Http\Controllers;
// Menentukan namespace agar controller ini berada dalam 
//direktori App\Http\Controllers, sesuai standar Laravel.

use App\Models\Item;
// Mengimpor model Item, yang digunakan untuk 
//berinteraksi dengan database.
use Illuminate\Http\Request;
//Mengimpor Request untuk menangani permintaan HTTP 
//dari pengguna.

class ItemController extends Controller
    //Mendefinisikan ItemController yang merupakan subclass 
    //dari Controller, sehingga dapat menggunakan fitur bawaan 
    //Laravel seperti middleware dan validasi.
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all(); //Mengambil semua data dari tabel items dalam database.
        return view('items.index', compact('items'));
        //Menampilkan halaman items.index dan mengirimkan data items ke tampilan.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
        //Mengembalikan tampilan items.create, yaitu halaman untuk menambahkan item baru.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        //Melakukan validasi input agar name dan description wajib diisi.

        //Item::create($request->all());
        //return redirect()->route('items.index');

        // Hanya masukkan atribut yang diizinkan
        Item::create($request->only(['name', 'description']));
        //Menyimpan data baru ke dalam tabel items, hanya atribut yang diperbolehkan.
        return redirect()->route('items.index')->with('success', 'Item added successfully.');
        //Mengarahkan pengguna kembali ke halaman utama dengan pesan sukses.
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item) //Mencari item berdasarkan ID yang diberikan di URL.
    {
        return view('items.show', compact('item')); //Menampilkan detail item di halaman items.show
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
        //Menampilkan halaman edit dengan data item yang ingin diperbarui.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        //Memastikan input valid sebelum diperbarui.

        $item->update($request->only(['name', 'description']));
        //Memperbarui hanya atribut yang diizinkan.
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
        //Kembali ke daftar item dengan pesan sukses.
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete(); // Menghapus item dari database.
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
        //Mengembalikan pengguna ke daftar item dengan pesan sukses.
    }
}
