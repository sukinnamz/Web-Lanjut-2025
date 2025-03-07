# Laporan Praktikum

Nama    : Innama Maesa Putri <br>
Kelas   : TI 2A <br>
Absen   : 13 <br>

## Prakikum 1
Variable ```$fillable``` berguna untuk mendaftarkan atribut (nama kolom) yang bisa kita isi ketika melakukan insert atau update ke database. <br>
<img src="Image/p1-1.jpg"> <br>
Menujukkan jika kolom kolom yang ditambahkan pada variable ```$fillable``` akan terisi dengan data yang telah ditambahkan pada controller. Namun ketika salah satu kolom dihapus dari variable ```$fillable``` maka hasilnya akan seperti berikut : <br>
<img src="Image/p1-2.jpg"> <br>

## Praktikum 2.1
Selain mengambil semua rekaman yang cocok dengan kueri tertentu, pada Laravel juga mendukung mengambil rekaman tunggal menggunakan metode find, first, atau firstWhere, yang mana ketiga sintaks tersebut mengembalikan hasil yang sama berupa baris pertama pada database seperti berikut, <br>
<img src="Image/p21-1.jpg"> <br>
Terkadang mungkin terdapat suatu kondisi untuk melakukan beberapa tindakan lain jika tidak ada hasil yang ditemukan. Metode findOr and firstOr akan mengembalikan satu contoh model atau, jika tidak ada hasil yang ditemukan maka akan menjalankan didalam fungsi. <br>
<img src="Image/p21-2.jpg"> <br>
Maka halaman web akan menampilkan kolom pada sintaks findOr saja dan kolom lain akan dikosongkan. Namun jika findOr diisi parameter baris database yang belum dibuat maka akan menampilkan halaman 404 not found seperti berikut, <br>
<img src="Image/p21-3.jpg"> <br>