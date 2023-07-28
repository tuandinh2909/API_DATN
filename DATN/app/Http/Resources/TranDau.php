<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class TranDau extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
      'trong_tai_1_id' => $this->trong_tai_1_id,
      'trong_tai_2_id' => $this->trong_tai_2_id,
      'lich_thi_dau_id' => $this->lich_thi_dau_id,
      'ti_so' => $this->ti_so,
      'tong_so_the' => $this->tong_so_the,
      'so_the_vang' => $this->so_the_vang,
      'so_the_do' => $this->so_the_do,
      'bu_gio' => $this->bu_gio,
      'created_at' => $this->created_at->format('d/m/Y'),
      'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}