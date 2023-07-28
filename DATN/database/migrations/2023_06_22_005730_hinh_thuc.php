<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HinhThuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HinhThuc', function (Blueprint $table) {
            $table->integer('id');
            $table->string('ten_hinh_thuc');
            $table->string('noi_dung');
            $table->integer('so_tran_toi_thieu');
            $table->integer('so_doi_toi_thieu');
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
        Schema::dropIfExists('HinhThuc');
    }
}
