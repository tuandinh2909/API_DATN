<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class CauThuTrongGiaiDau extends JsonResource {
   public function toArray($request) {
     return [
        'id' => $this->id,
        'id_cau_thu' => $this->id_cau_thu,
        'id_giai_dau' => $this->id_giai_dau,
        'so_tran_tham_gia' => $this->so_tran_tham_gia,
        'so_ban_thang' => $this->so_ban_thang,
        'so_the_vang' => $this->so_the_vang,
        'so_the_do' => $this->so_the_do,
        'created_at' => $this->created_at->format('d/m/Y'),
        'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}