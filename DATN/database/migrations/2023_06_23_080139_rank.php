<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Rank', function (Blueprint $table) {
            $table->id();
            $table->integer('rank');
            $table->string('ten_doi_bong');
            $table->string('logo');
            $table->integer('tong_diem');
            $table->integer('thang');
            $table->integer('thua');
            $table->integer('hoa');
            $table->integer('tong_so_tran');
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
        Schema::dropIfExists('Rank');
    }
}
