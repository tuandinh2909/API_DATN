<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class Card extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
       'tran_dau_id' => $this->tran_dau_id,
       'cau_thu_id' => $this->cau_thu_id,
       'thoi_diem' => $this->thoi_diem,
       'doi_bong_id' => $this->doi_bong_id,
       'created_at' => $this->created_at->format('d/m/Y'),
       'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}