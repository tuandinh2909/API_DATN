<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class DangKyGiai extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
       'doi_bong_id' => $this->doi_bong_id,
       'giai_dau_id' => $this->giai_dau_id,
       'ngay_dang_ky' => $this->ngay_dang_ky,
       'trang_thai_dang_ky' => $this->trang_thai_dang_ky,
       'noi_dung' => $this->noi_dung,
       
       'trang_thai_tb'=>$this->trang_thai_tb,
       'created_at' => $this->created_at->format('d/m/Y'),
       'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}