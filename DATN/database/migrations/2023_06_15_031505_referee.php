<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Referee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referee', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten');
            $table->string('vi_tri');
            $table->integer('the_phat');
            $table->integer('phat_den');
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
        Schema::dropIfExists('Referee');
    }
}
