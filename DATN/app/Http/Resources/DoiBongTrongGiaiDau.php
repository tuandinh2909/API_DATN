<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoiBongTrongGiaiDau extends JsonResource
{
    public function toArray($request) {
        return [
           'id' => $this->id,
           'giai_dau_id' => $this->giai_dau_id,
           'doi_bong_id' => $this->doi_bong_id,
           'bang_dau' => $this->bang_dau,
           'so_tran_thang' => $this->so_tran_thang,
           'so_tran_hoa' => $this->so_tran_hoa,
           'so_tran_thua' => $this->so_tran_thua,
           'tong_ban_thang' => $this->tong_ban_thang,
           'tong_ban_thua' => $this->tong_ban_thua,
           'so_the_vang' => $this->so_the_vang,
           'so_the_do' => $this->so_the_do,
           'created_at' => $this->created_at->format('d/m/Y'),
           'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
      } 
}
