<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class TranDau extends Model {
   use HasFactory;
   protected $fillable = ['trong_tai_1_id','trong_tai_2_id','lich_thi_dau_id','ti_so','tong_so_the','so_the_vang','so_the_do','bu_gio'];
}