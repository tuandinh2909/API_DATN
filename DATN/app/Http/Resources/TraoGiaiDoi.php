<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class TraoGiaiDoi extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
       'hang' => $this->hang,
       'giai_dau_id' => $this->giai_dau_id,
       'doi_bong_id' => $this->doi_bong_id,
       'giai_thuong_id' => $this->giai_thuong_id,
       'created_at' => $this->created_at->format('d/m/Y'),
       'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}