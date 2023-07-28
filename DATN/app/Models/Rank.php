<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Rank extends Model {
   use HasFactory;
   protected $fillable = ['rank', 'ten_doi_bong','logo','tong_diem','thang','thua','hoa','tong_so_tran'];
}