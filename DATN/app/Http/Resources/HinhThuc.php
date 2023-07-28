<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class HinhThuc extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
       'ten_hinh_thuc' => $this->ten_hinh_thuc,
       'noi_dung'=>$this->noi_dung,
       'so_tran_toi_thieu'=>$this->so_tran_toi_thieu,
       'so_doi_toi_thieu'=>$this->so_doi_toi_thieu,
       'created_at' => $this->created_at->format('d/m/Y'),
       'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}