<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChiTietTomTat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_tom_tats', function (Blueprint $table) {
            $table->id();
            $table->string('loai_thong_tin');
            $table->integer('giai_dau_id');
            $table->integer('tran_dau_id');
            $table->integer('doi_bong_id');
            $table->integer('cau_thu_id');
            $table->integer('thoi_gian');
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
        Schema::dropIfExists('ChiTietTomTat');
    }
}
