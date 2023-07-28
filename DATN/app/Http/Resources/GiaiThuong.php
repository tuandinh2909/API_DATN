<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class GiaiThuong extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
       'ten_giai_thuong' => $this->ten_giai_thuong,
       'so_tien_thuong' => $this->so_tien_thuong,
       'created_at' => $this->created_at->format('d/m/Y'),
       'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}