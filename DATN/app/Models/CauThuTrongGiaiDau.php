<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class CauThuTrongGiaiDau extends Model {
   use HasFactory;
   protected $fillable = ['id_cau_thu','id_giai_dau', 'tran_dau_id', 'so_tran_tham_gia', 'so_ban_thang','so_the_vang','so_the_do'];
}