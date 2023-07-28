<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class TraoGiaiCT extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
      'cau_thu_id'=>$this->cau_thu_id,
      'tran_dau_id'=>$this->tran_dau_id,
       'doi_bong_id' => $this->doi_bong_id,
       'giai_thuong_id' => $this->giai_thuong_id,
       'created_at' => $this->created_at->format('d/m/Y'),
       'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}