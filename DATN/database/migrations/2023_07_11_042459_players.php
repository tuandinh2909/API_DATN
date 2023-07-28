<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Players extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->integer('doi_bong_id');
            // $table-> foreign('doi_bong_id')->references('id')->on('football_teams');
            $table->integer('id_tai_khoan');
            $table->string('ten_cau_thu');
            $table->string('avatar');
            $table->integer('so_ao');
            $table->string('vi_tri');
            $table->string('vai_tro');
            $table->integer('so_tran_tham_gia');
            $table->integer('so_ban_thang');
            $table->integer('so_kien_tao');
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
        Schema::dropIfExists('Players');
    }
}
