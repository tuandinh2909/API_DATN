<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class TinTuc extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
       'tieu_de' => $this->tieu_de,
       'noi_dung' => $this->noi_dung,
       'created_at' => $this->created_at->format('d/m/Y'),
       'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}