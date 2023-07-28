<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class LichTD extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
      'ma_tran_dau'=>$this->ma_tran_dau,
      'doi_bong_1_id' => $this->doi_bong_1_id,
      'doi_bong_2_id' => $this->doi_bong_2_id,
      'giai_dau_id' => $this->giai_dau_id,
      'thoi_gian' => $this->thoi_gian,
      'ngay_dien_ra' => $this->ngay_dien_ra,
      'trang_thai_tran_dau' => $this->trang_thai_tran_dau,
      'dia_diem' => $this->dia_diem,
      'created_at' => $this->created_at->format('d/m/Y'),
      'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}