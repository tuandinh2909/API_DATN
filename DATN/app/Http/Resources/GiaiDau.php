<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class GiaiDau extends JsonResource {
   public function toArray($request) {
     return [
      'id' => $this->id,
        'ten_giai_dau' => $this->ten_giai_dau,
        'hinh_thuc_dau_id' => $this->hinh_thuc_dau_id,
        'ban_to_chuc' => $this->ban_to_chuc,
        'san_dau' => $this->san_dau,
        'ngay_bat_dau' => $this->ngay_bat_dau,
        'ngay_ket_thuc' => $this->ngay_ket_thuc,
        'so_luong_doi_bong' => $this->so_luong_doi_bong,
        'so_bang_dau' => $this->so_bang_dau,
        'so_doi_vao_vong_trong' => $this->so_doi_vao_vong_trong,
        'loai_san' => $this->loai_san,
        'so_vong_dau' => $this->so_vong_dau,
        'so_tran_da_dau' => $this->so_tran_da_dau,
        'created_at' => $this->created_at->format('d/m/Y'),
        'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}