<!DOCTYPE html>
<html>

<head>
    <title>Edit Item</title>
</head>
<!-- Mendefinisikan struktur dasar HTML dan memberikan judul halaman "Edit Item". -->

<body>
    <h1>Edit Item</h1>
    <!-- Menampilkan judul halaman untuk memberi tahu pengguna bahwa ini adalah halaman edit item. -->
    <form action="{{ route('items.update', $item) }}" method="POST">
        <!-- Mengirim data ke route items.update, yang akan memanggil method update() di ItemController. -->
        @csrf
        <!-- Laravel membutuhkan token CSRF untuk mencegah serangan Cross-Site Request Forgery. -->
        @method('PUT')
        <!-- menentukan metode PUT agar Laravel mengenali ini sebagai update request. -->
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $item->name }}" required>
        <!-- Menampilkan input field dengan nilai default dari $item->name yang diambil dari database. -->
        <br>
        <label for="description">Description:</label>
        <textarea name="description" required>{{ $item->description }}</textarea>
        <!-- Menampilkan textarea dengan isi default dari $item->description. -->
        <br>
        <button type="submit">Update Item</button>
        <!-- Ketika diklik, form akan dikirim ke items.update untuk diperbarui dalam database. -->
    </form>
    <a href="{{ route('items.index') }}">Back to List</a>
    <!-- Menggunakan route('items.index') untuk kembali ke halaman daftar item. -->
</body>

</html>