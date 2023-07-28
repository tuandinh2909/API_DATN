<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class Rank extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
       'rank' => $this->rank,
       'ten_doi_bong' => $this->ten_doi_bong,
       'logo' => $this->logo,
       'tong_diem' => $this->tong_diem,
       'thang' => $this->thang,
       'thua' => $this->thua,
       'hoa' => $this->hoa,
       'tong_so_tran' => $this->tong_so_tran,
       'created_at' => $this->created_at->format('d/m/Y'),
       'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}