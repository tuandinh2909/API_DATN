<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Player extends Model {
   use HasFactory;
   protected $fillable = ['doi_bong_id', 'id_tai_khoan','ten_cau_thu','so_ao','vi_tri','vai_tro','avatar','so_tran_tham_gia','so_ban_thang','so_kien_tao','so_the_vang','so_the_do'];
}