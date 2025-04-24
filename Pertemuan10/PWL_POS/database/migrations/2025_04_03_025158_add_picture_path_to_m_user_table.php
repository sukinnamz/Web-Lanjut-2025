<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPicturePathToMUserTable extends Migration
{
    public function up()
    {
        Schema::table('m_user', function (Blueprint $table) {
            $table->string('picture_path')->nullable()->after('nama'); // sesuaikan "nama" dengan kolom sebelumnya
        });
    }

    public function down()
    {
        Schema::table('m_user', function (Blueprint $table) {
            $table->dropColumn('picture_path');
        });
    }
}
