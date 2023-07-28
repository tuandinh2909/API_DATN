<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DangKyGiai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dang_ky_giais', function (Blueprint $table) {
            $table->id();
            $table->integer('doi_bong_id');
            $table->integer('giai_dau_id');
            $table->string('ngay_dang_ky');
            $table->integer('trang_thai_dang_ky');
            $table->string('noi_dung');
            $table->integer('trang_thai_tb');
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
        Schema::dropIfExists('DangKyGiai');
    }
}
