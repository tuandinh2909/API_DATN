<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class LichSuQuy extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
      'quy_doi_id'=>$this->doi_bong_id,
       'noi_dung' => $this->so_tien_quy,
       'so_tien' => $this->so_tien,
       'created_at' => $this->created_at->format('d/m/Y'),
       'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}