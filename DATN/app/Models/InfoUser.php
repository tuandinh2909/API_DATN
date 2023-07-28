<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class InfoUser extends Model {
   use HasFactory;
   protected $fillable = ['id_tai_khoan','hoten', 'khoa','lop','sdt','gioithieu'];
}