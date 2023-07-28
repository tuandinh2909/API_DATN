<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class GiaiDau extends Model {
   use HasFactory;
   protected $fillable = ['ten_giai_dau', 'hinh_thuc_dau_id', 'ban_to_chuc', 'san_dau','ngay_bat_dau','ngay_ket_thuc','so_luong_doi_bong','so_bang_dau', 'so_doi_vao_vong_trong', 'loai_san','so_vong_dau', 'so_tran_da_dau'];
}