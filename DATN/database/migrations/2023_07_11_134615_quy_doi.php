<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuyDoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quy_dois', function (Blueprint $table) {
            $table->id();
            $table->integer('doi_bong_id');
            $table->string('tieu_de');
            $table->string('nguoi_dong_tien');
            $table->string('trang_thai');
            $table->string('danh_muc');
            $table->integer('so_tien_quy');
            $table->string('thoi_gian');
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
        Schema::dropIfExists('QuyDoi');
    }
}
