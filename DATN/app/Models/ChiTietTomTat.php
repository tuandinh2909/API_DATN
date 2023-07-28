<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ChiTietTomTat extends Model {
   use HasFactory;
   protected $fillable = ['loai_thong_tin','giai_dau_id', 'tran_dau_id', 'cau_thu_id', 'doi_bong_id','thoi_gian'];
}