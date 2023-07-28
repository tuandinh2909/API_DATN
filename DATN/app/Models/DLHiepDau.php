<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class DLHiepDau extends Model {
   use HasFactory;
   protected $fillable = ['loai_hiep_dau_id', 'du_lieu_tran_dau_id','tong_so_the','so_the_vang','so_the_do','bu_gio','ty_so'];
}