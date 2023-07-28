<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoiBongTrongGiaiDau extends Model
{
    use HasFactory;
    protected $fillable = ['giai_dau_id', 'doi_bong_id', 'bang_dau','so_tran_thang','so_tran_hoa','so_tran_thua','tong_ban_thang','tong_ban_thua','so_the_vang','so_the_do'];

    public static function getDoiBongIdsByGiaiDauId($giaiDauId)
{
    return self::where('giai_dau_id', $giaiDauId)->pluck('doi_bong_id')->all();
}
}
