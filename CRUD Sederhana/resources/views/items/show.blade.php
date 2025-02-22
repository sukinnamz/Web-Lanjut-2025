<!DOCTYPE html>
<html lang="en">

<head>
    <title>Item List</title>
</head>
<!-- Mendefinisikan struktur dasar HTML dengan tag <html> dan bahasa yang digunakan adalah en (English). -->

<body>
    <h1>Items</h1>
    @if (session('success'))
        <!-- Mengecek apakah ada pesan sukses dalam session dan menampilkannya dalam elemen <p>. -->
        <p>{{session('success') }}</p>
        <!-- digunakan untuk menampilkan pesan sukses yang disimpan dalam session, misalnya setelah item berhasil ditambahkan,
                                    diubah, atau dihapus. -->
    @endif
    <a href="{{ route('items.create') }}">Add Item</a>
    <!-- mengarah ke route untuk halaman formulir tambah item. -->
    <ul>
        @foreach ($items as $item)
            <!-- Melakukan iterasi untuk setiap item yang ada dalam variabel $items dan menampilkannya dalam daftar <ul>. -->
            <li>
                {{ $item->name }} .
                <!-- Menampilkan nama item yang ada dalam variabel $item. -->
                <a href="{{ route('items.edit', $item) }}">Edit</a>
                <!-- Link untuk mengedit item dengan route items.edit yang mengarahkan ke halaman edit item yang dipilih. -->
                <form action="{{ route('items.destroy', $item) }}" method="post" style="display:inline;">
                    @csrf
                    <!-- @csrf memberikan token CSRF untuk melindungi dari serangan. -->
                    @method('DELETE')
                    <!-- @method('DELETE') memberitahu Laravel bahwa ini adalah request untuk menghapus item. -->
                    <button type="submit">Delete</button>
                    <!-- Tombol Delete untuk menghapus item yang bersangkutan. -->
                </form>
            </li>
        @endforeach
    </ul>
</body>

</html>