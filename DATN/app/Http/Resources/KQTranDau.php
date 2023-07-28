<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class KQTranDau extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
       'doi_bong_1_id' => $this->doi_bong_1_id,
       'doi_bong_2_id' => $this->doi_bong_2_id,
       'giai_dau_id' => $this->giai_dau_id,
       'du_lieu_tran_dau_id' => $this->du_lieu_tran_dau_id,
       'ty_so' => $this->ty_so,
       'doi_thang_id' => $this->doi_thang_id,
       'created_at' => $this->created_at->format('d/m/Y'),
       'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}