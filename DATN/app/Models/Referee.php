<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Referee extends Model {
   use HasFactory;
   protected $fillable = ['ho_ten', 'the_phat','phat_den','vi_tri','tong_so_tran'];
}