<?php

use Illuminate\Database\Migrations\Migration;
//Ini adalah kelas dasar untuk migration di Laravel. Setiap migration harus mewarisi kelas ini.
use Illuminate\Database\Schema\Blueprint;
//Digunakan untuk mendefinisikan struktur tabel dalam migration.
use Illuminate\Support\Facades\Schema;
//Menyediakan fungsionalitas untuk operasi schema seperti membuat, mengubah, atau menghapus tabel.

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            //Membuat tabel bernama items.
            //Parameter Blueprint $table digunakan untuk mendefinisikan kolom tabel.
            $table->id();
            //Menambahkan kolom id sebagai primary key dengan auto-increment.
            $table->string('name');
            //Menambahkan kolom name dengan tipe data string (biasanya untuk nama item).
            $table->string('description');
            //Menambahkan kolom description untuk menyimpan deskripsi item, juga bertipe string.
            $table->timestamps();
            //Menambahkan dua kolom waktu: created_at dan updated_at secara otomatis oleh Laravel. Kolom ini akan mencatat waktu pembuatan dan pembaruan data.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
        //Menghapus tabel items jika tabel tersebut ada.
    }
};
