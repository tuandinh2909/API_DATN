<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class KQTranDau extends Model {
   use HasFactory;
   protected $fillable = ['doi_bong_1_id','doi_bong_2_id','giai_dau_id','du_lieu_tran_dau_id','ty_so','doi_thang_id'];
}