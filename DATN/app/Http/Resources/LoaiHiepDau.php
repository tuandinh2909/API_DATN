<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class LoaiHiepDau extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
       'ten_hiep_dau' => $this->ten_hiep_dau,
       
       'created_at' => $this->created_at->format('d/m/Y'),
       'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}