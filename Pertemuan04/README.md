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
<img src="Image/p21 - 2.jpg"> <br>
Maka halaman web akan menampilkan kolom pada sintaks findOr saja dan kolom lain akan dikosongkan. Namun jika findOr diisi parameter baris database yang belum dibuat maka akan menampilkan halaman 404 not found seperti berikut, <br>
<img src="Image/p21 - 3.jpg"> <br>

## Praktikum 2.2
Jika ingin memberikan pengecualian jika model tidak ditemukan. Hal ini sangat berguna dalam rute atau pengontrol. Metode findOrFail and firstOrFail akan mengambil hasil pertama dari kueri; namun, jika tidak ada hasil yang ditemukan, sebuah Illuminate\Database\Eloquent\ModelNotFoundException akan dilempar. <br>
Hasil jika model ditemukan : <br>
<img src="Image/p22-1.jpg"> <br>
Jika model tidak ditemukan maka akan mengembalikan halaman 404 not found seperti berikut, <br>
<img src="Image/p22-2.jpg"> <br>

## Praktikum 2.3
Saat berinteraksi dengan model Eloquent, juga dapat menggunakan metode agregat ```count, sum, max,``` dan lainnya yang disediakan oleh pembuat kueri Laravel. Pada praktikum ini dilakukan count pada baris yang memiliki level_id = 2, awalnya hasil tidak dapat ditampilkan seperti berikut, 
<img src="Image/p23-1.jpg"> <br>
Namun setelah beberapa modifikasi pada controller dan view hasilnya seperti berikut <br>
<img src="Image/p23-2.jpg"> <br>