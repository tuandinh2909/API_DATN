<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class GiaiThuong extends Model {
   use HasFactory;
   protected $fillable = ['ten_giai_thuong', 'so_tien_thuong'];
}