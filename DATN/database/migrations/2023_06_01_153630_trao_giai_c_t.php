<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TraoGiaiCT extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TraoGiaiCT', function (Blueprint $table) {
            $table->id();
            $table->integer('cau_thu_id');
            $table->integer('tran_dau_id');
            $table->integer('doi_bong_id');
            $table->integer('giai_thuong_id');
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
        Schema::dropIfExists('TraoGiaiCT');
    }
}
