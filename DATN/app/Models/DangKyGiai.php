<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class DangKyGiai extends Model {
   use HasFactory;
   protected $fillable = ['doi_bong_id', 'giai_dau_id','ngay_dang_ky','trang_thai_dang_ky','noi_dung','trang_thai_tb'];
}