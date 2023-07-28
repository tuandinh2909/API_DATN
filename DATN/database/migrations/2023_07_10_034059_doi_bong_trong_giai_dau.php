<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DoiBongTrongGiaiDau extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doi_bong_trong_giai_daus', function (Blueprint $table) {
            $table->id();
            $table->integer('giai_dau_id');
            $table->integer('doi_bong_id');
            $table->string('bang_dau');
            $table->integer('so_tran_thang');
            $table->integer('so_tran_hoa');
            $table->integer('so_tran_thua');
            $table->integer('tong_ban_thang');
            $table->integer('tong_ban_thua');
            $table->integer('so_the_vang');
            $table->integer('so_the_do');
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
        Schema::dropIfExists('DoiBongTrongGiaiDau');
    }
}
