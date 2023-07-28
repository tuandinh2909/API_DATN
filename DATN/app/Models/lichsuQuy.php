<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class LichSuQuy extends Model {
   use HasFactory;
   protected $fillable = ['quy_doi_id', 'noi_dung','so_tien'];
}