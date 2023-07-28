<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class HinhThuc extends Model {
   use HasFactory;
 
   protected $fillable = ['id','ten_hinh_thuc','noi_dung','so_tran_toi_thieu','so_doi_toi_thieu'];
}