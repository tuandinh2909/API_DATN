<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InfoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('InfoUser', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tai_khoan');
            $table->String('hoten');
            $table->String('khoa');
            $table->String('lop');
            $table->integer('sdt');
            $table->String('gioithieu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('InfoUser');
    }
}
