<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class TraoGiaiDoi extends Model {
   use HasFactory;
   protected $fillable = ['hang', 'giai_dau_id','doi_bong_id','giai_thuong_id'];
}