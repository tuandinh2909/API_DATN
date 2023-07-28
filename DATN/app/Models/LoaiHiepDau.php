<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class LoaiHiepDau extends Model {
   use HasFactory;
   protected $fillable = ['ten_hiep_dau'];
}