<!DOCTYPE html>
<html>

<head>
    <title>Add Item</title>
</head>
<!-- Mendefinisikan struktur dasar HTML dengan judul halaman "Add Item". -->

<body>
    <h1>Add Item</h1>
    <!-- Menampilkan judul halaman formulir untuk menambah item baru. -->
    <form action="{{ route('items.store') }}" method="POST">
        <!-- Formulir ini mengarah ke store() di ItemController
    dan Menggunakan metode POST untuk menyimpan data baru. -->
        @csrf
        <!-- Laravel memerlukan Cross-Site Request Forgery (CSRF) token untuk keamanan form. -->
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <!-- Input teks untuk nama item, wajib diisi (required). -->
        <br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
        <!-- Input textarea untuk deskripsi item, wajib diisi (required). -->
        <br>
        <button type="submit">Add Item</button>
        <!-- Tombol untuk mengirimkan formulir. -->
    </form>
    <a href="{{ route('items.index') }}">Back to List</a>
    <!-- Menggunakan route('items.index') → Mengembalikan pengguna ke halaman daftar item. -->

</body>

</html>