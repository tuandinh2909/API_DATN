<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TranDau extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tran_daus', function (Blueprint $table) {
            $table->id();
            $table->integer('trong_tai_1_id');
            $table->integer('trong_tai_2_id');
            $table->integer('lich_thi_dau_id');
            $table->string('ti_so');
            $table->integer('tong_so_the');
            $table->integer('so_the_vang');
            $table->integer('so_the_do');
            $table->integer('bu_gio');
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
        Schema::dropIfExists('TranDau');
    }
}
