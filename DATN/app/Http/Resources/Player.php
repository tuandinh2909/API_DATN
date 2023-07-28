<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class Player extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
       'doi_bong_id' => $this->doi_bong_id,
       'ten_cau_thu' => $this->ten_cau_thu,
       'id_tai_khoan'=> $this->id_tai_khoan,
       'so_ao' => $this->so_ao,
       'vi_tri' => $this->vi_tri,
       'vai_tro'=>$this->vai_tro,
       'avatar'=>$this->avatar,
       'so_tran_tham_gia' => $this->so_tran_tham_gia,
       'so_ban_thang' => $this->so_ban_thang,
       'so_kien_tao' => $this->so_kien_tao,
       'so_the_vang' => $this->so_the_vang,
       'so_the_do' => $this->so_the_do,
       'created_at' => $this->created_at->format('d/m/Y'),
       'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}