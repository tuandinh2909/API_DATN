<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DLHiepDau extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DLHiepDau', function (Blueprint $table) {
            $table->id();
            $table->integer('loai_hiep_dau_id');
            $table->integer('du_lieu_tran_dau_id');
            $table->string('ty_so');
            $table->integer('tong_so_the');
            $table->integer('so_the_vang');
            $table->integer('so_the_do');
            $table->integer('bo_gio');
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
        Schema::dropIfExists('DLTranDau');
    }
}
