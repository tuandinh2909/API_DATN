<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LichThiDaus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lich_thi_daus', function (Blueprint $table) {
            $table->id();
            $table->string('ma_tran_dau');
            $table->integer('doi_bong_1_id');
            $table->integer('doi_bong_2_id');
            $table->integer('giai_dau_id');
            $table->string('thoi_gian');
            $table->string('ngay_dien_ra');
            $table->integer('trang_thai_tran_dau');
            $table->string('dia_diem');
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
        Schema::dropIfExists('LichTD');
    }
}
