<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class Referee extends JsonResource {
   public function toArray($request) {
     return [
      'id'=>$this->id,
       'ho_ten' => $this->ho_ten,
       'the_phat' => $this->the_phat,
       'phat_den' => $this->phat_den,
       'vi_tri'=>$this->vi_tri,
       'tong_so_tran'=> $this->tong_so_tran,
       'created_at' => $this->created_at->format('d/m/Y'),
       'updated_at' => $this->updated_at->format('d/m/Y'),
     ];
   }
}