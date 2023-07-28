<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class QuyDoi extends Model {
   use HasFactory;
   protected $fillable = ['doi_bong_id', 'so_tien_quy','nguoi_dong_tien','tieu_de','danh_muc','trang_thai','thoi_gian'];
}