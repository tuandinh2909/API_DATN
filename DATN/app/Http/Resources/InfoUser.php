<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class InfoUser extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
      'id_tai_khoan'=>$this->id_tai_khoan,
       'hoten' => $this->hoten,
       'khoa' => $this->khoa,
       'lop' => $this->lop,
       'sdt'=>$this->sdt,
       'gioithieu' => $this->gioithieu,
       'created_at' => $this->created_at->format('d/m/Y'),
       'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}