<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class DlHiepDau extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
       'loai_hiep_dau_id' => $this->loai_hiep_dau_id,
       'du_lieu_tran_dau_id' => $this->du_lieu_tran_dau_id,
       'tong_so_the' => $this->tong_so_the,
       'so_the_vang' => $this->so_the_vang,
       'so_the_do' => $this->so_the_do,
       'bu_gio' => $this->bu_gio,
       'ty_so' => $this->ty_so,
      

       'created_at' => $this->created_at->format('d/m/Y'),
       'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}