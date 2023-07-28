<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GiaiDau extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giai_daus', function (Blueprint $table) {
            $table->id();
            $table->string('ten_giai_dau'); 
            $table->integer('hinh_thuc_dau_id');
            $table->string('ban_to_chuc');
            $table->string('san_dau');
            $table->string('ngay_bat_dau');
            $table->string('ngay_ket_thuc');
            $table->integer('so_luong_doi_bong');
            $table->integer('so_bang_dau');
            $table->integer('so_doi_vao_vong_trong');
            $table->integer('loai_san');
            $table->integer('so_vong_dau');
            $table->integer('so_tran_da_dau');
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
        Schema::dropIfExists('GiaiDau');
    }
}
