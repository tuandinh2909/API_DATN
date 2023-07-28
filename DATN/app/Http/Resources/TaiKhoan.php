<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class TaiKhoan extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
       'matkhau' => $this->matkhau,
       'email' => $this->email,
       'hoten' => $this->hoten,
       'sdt' => $this->sdt,
       'loai_tai_khoan' => $this->loai_tai_khoan,
       'lop' => $this->lop,
       'avatar' => $this->avatar,
       'trang_thai'=>$this->trang_thai,
       'created_at' => $this->created_at->format('d/m/Y'),
       'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}