<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Football extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Football', function (Blueprint $table) {
            $table->id();
            $table->integer('nguoi_quan_ly_id');
           $table->integer('khoa');
           $table->string('lop');
           $table->integer('sl_thanh_vien');
            $table->string('ten_doi_bong');
            $table->string('logo');
            $table->integer('so_diem');
            $table->integer('so_tran_dau');
            $table->integer('so_tran_thang');
            $table->integer('so_tran_thua');
            $table->integer('so_ban_thang');
            $table->integer('so_ban_thua');
            $table->integer('trang_thai_dang_ky');
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
        Schema::dropIfExists('Football');
    }
}
