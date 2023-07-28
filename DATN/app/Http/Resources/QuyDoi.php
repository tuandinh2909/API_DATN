<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class QuyDoi extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
      'doi_bong_id'=>$this->doi_bong_id,
      'tieu_de'=>$this->tieu_de,
      'danh_muc'=>$this->danh_muc,
      'nguoi_dong_tien'=>$this->nguoi_dong_tien,
      'trang_thai'=>$this->trang_thai,
      'thoi_gian'=>$this->thoi_gian,
       'so_tien_quy' => $this->so_tien_quy,
       'created_at' => $this->created_at->format('d/m/Y'),
       'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}