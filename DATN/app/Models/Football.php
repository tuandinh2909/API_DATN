<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Football extends Model {
   use HasFactory;
   protected $fillable = ['nguoi_quan_ly_id', 'ten_doi_bong','logo','so_diem','so_tran_dau','so_tran_thua','so_tran_thang','so_ban_thua','trang_thai_dang_ky','sl_thanh_vien','so_ban_thang','khoa','lop'];
}