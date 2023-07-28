<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class ChiTietTomTat extends JsonResource {
   public function toArray($request) {
     return [
        'id' => $this->id,
        'loai_thong_tin' => $this->loai_thong_tin,
        'giai_dau_id' => $this->giai_dau_id,
        'tran_dau_id' => $this->tran_dau_id,
        'doi_bong_id' => $this->doi_bong_id,
        'cau_thu_id' => $this->cau_thu_id,
        'thoi_gian' => $this->thoi_gian,
        'created_at' => $this->created_at->format('d/m/Y'),
        'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}