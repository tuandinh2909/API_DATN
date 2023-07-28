<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class Football extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
       'nguoi_quan_ly_id' => $this->nguoi_quan_ly_id,
       'ten_doi_bong' => $this->ten_doi_bong,
       'logo' => $this->logo,
       'khoa' => $this->khoa,
       'lop' => $this->lop,
       'sl_thanh_vien' => $this->sl_thanh_vien,
       'so_diem' => $this->so_diem,
       'so_tran_dau' => $this->so_tran_dau,
       'so_tran_thang' => $this->so_tran_thang,
       'so_tran_thua' => $this->so_tran_thua,
       'so_ban_thang' => $this->so_ban_thang,
       'trang_thai_dang_ky' => $this->trang_thai_dang_ky,

       'created_at' => $this->created_at->format('d/m/Y'),
       'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}