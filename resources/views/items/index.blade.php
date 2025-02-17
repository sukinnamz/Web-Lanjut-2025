<!DOCTYPE html>
<html>

<head>
    <title>Item List</title>
</head>
<!-- Mendefinisikan struktur dasar HTML dengan judul halaman "Item List". -->

<body>
    <h1>Items</h1>
    <!-- Menampilkan judul halaman. -->
    @if(session('success'))
        <!-- Mengecek apakah ada pesan sukses dalam session.
                                            Jika ada, ditampilkan dalam elemen dibawah -->
        <p>{{ session('success') }}</p>
    @endif
    <!-- Jika tidak ada pesan dalam session -->
    <a href="{{ route('items.create') }}">Add Item</a>
    <!-- Mengarahkan ke halaman form untuk menambah item baru. -->
    <ul>
        @foreach ($items as $item)
            <!-- Melakukan iterasi untuk setiap item dalam variabel $items dan 
                                menampilkannya dalam daftar <ul>...</ul>. -->
            <li>
                {{ $item->name }} -
                <!-- Menampilkan nama dari item yang sedang di-loop. -->
                <a href="{{ route('items.edit', $item) }}">Edit</a>
                <!-- Mengarahkan ke halaman edit item berdasarkan ID item yang diklik. -->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                    @csrf
                    <!-- Menyertakan token CSRF untuk keamanan Laravel. -->
                    @method('DELETE')
                    <!-- Laravel hanya mendukung metode GET & POST dalam HTML, 
                            jadi ini digunakan untuk mengubah metode menjadi DELETE. -->
                    <button type="submit">Delete</button>
                    <!-- Laravel hanya mendukung metode GET & POST dalam HTML, jadi ini digunakan untuk mengubah metode menjadi DELETE. -->
                </form>
            </li>
        @endforeach
    </ul>
</body>

</html>