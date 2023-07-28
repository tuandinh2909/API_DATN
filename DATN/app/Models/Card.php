<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Card extends Model {
   use HasFactory;
   protected $fillable = ['tran_dau_id', 'cau_thu_id','thoi_diem','doi_bong_id'];
}