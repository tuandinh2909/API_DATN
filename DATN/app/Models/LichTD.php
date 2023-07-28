<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class LichTD extends Model {
   use HasFactory;
   protected $table = 'lich_thi_daus';
   protected $fillable = ['ma_tran_dau','doi_bong_1_id', 'doi_bong_2_id','giai_dau_id','thoi_gian','ngay_dien_ra','trang_thai_tran_dau','dia_diem'];
}