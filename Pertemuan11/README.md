# Laporan Praktikum Jobsheet 11 - RESTful API (Bagian 2)

## Pendahuluan

Pada praktikum kali ini, mahasiswa mempelajari penerapan lanjutan RESTful API menggunakan Laravel, khususnya dengan fitur **Eloquent Accessor** untuk memanipulasi data secara otomatis ketika data diambil dari database. Contoh kasus digunakan pada field gambar (image) untuk user.

---

## Praktikum 1 - Implementasi Eloquent Accessor

### Langkah-langkah:

1. **Pastikan Postman sudah terpasang**  
   Digunakan untuk menguji REST API secara lokal.

2. **Modifikasi Tabel `m_user`**  
   Tambahkan kolom baru bernama `image`:
   ```bash
   php artisan make:migration add_image_to_m_user_table
   ```

3. **Edit file migrasi**  
   Tambahkan kolom image:
   ```php
   Schema::table('m_user', function (Blueprint $table) {
       $table->string('image');
   });
   ```

4. **Jalankan migrasi**
   ```bash
   php artisan migrate
   ```

5. **Modifikasi Model `UserModel`**
   Tambahkan kode berikut agar kolom image otomatis menambahkan URL direktori saat diakses:
   ```php
   use Illuminate\Database\Eloquent\Casts\Attribute;

   protected function image(): Attribute
   {
       return Attribute::make(
           get: fn ($image) => url('/storage/posts/' . $image),
       );
   }
   ```

6. **Modifikasi `RegisterController`**
   Tambahkan validasi dan penyimpanan data field `image`, serta tampilkan URL lengkap hasil upload gambar dengan accessor.

7. **Tambahkan Route Baru**
   Di `routes/api.php`:
   ```php
   Route::post('/register1', [RegisterController::class, '__invoke']);
   ```

8. **Uji Coba dengan Postman**
   - Gunakan metode POST
   - Endpoint: `http://127.0.0.1:8000/api/register1`
   - Pada tab Body pilih `form-data`, lalu:
     - Isi `username`, `nama`, `password`, `password_confirmation`, `level_id`
     - Tambahkan key `image` bertipe `File` dan upload gambar
   - Klik Send

9. **Perbedaan dengan Register Sebelumnya**
   - Sebelumnya hanya menyimpan nama file image biasa.
   - Sekarang menggunakan accessor untuk menampilkan image dalam bentuk full path URL, memudahkan frontend untuk menampilkan gambar.

### Penjelasan:
Dengan menggunakan **Eloquent Accessor**, kita dapat memanipulasi tampilan data secara otomatis saat data diambil dari database. Dalam kasus ini, saat user baru didaftarkan dengan file gambar, path lengkap gambar akan ditampilkan langsung di response API, bukan hanya nama file saja.

---

## Tugas
Implementasikan fitur serupa (upload file/gambar) pada:
- **Tabel `m_barang`**
- Gunakan juga gambar tersebut dalam **transaksi**

Langkah-langkah:
- Tambahkan field `image` pada tabel `m_barang`
- Buat accessor seperti pada `UserModel`
- Update controller untuk `barang` agar mendukung upload file saat `create` dan `update`
- Lakukan uji coba GET untuk menampilkan data dengan path gambar yang sudah terformat

Selamat belajar dan bereksplorasi lebih lanjut!