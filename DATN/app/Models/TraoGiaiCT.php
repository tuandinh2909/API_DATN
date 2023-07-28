<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class TraoGiaiCT extends Model {
   use HasFactory;
   protected $fillable = ['cau_thu_id', 'tran_dau_id','doi_bong_id','giai_thuong_id'];
}