<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Http\Resources\Player as PlayerResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class PLayerController extends Controller
{
   
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
    public function index() {
        $player = Player::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách cầu thủ",
        'data'=>PlayerResource::collection($player)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
       'doi_bong_id' => 'required', 'ten_cau_thu' => 'required','so_ao'=>'required','avatar'=>'required','vi_tri'=>'required','vai_tro'=>'required','so_tran_tham_gia'=>'required','so_ban_thang'=>'required','so_kien_tao'=>'required','so_the_vang'=>'required','so_the_do'=>'required','id_tai_khoan'=>'required'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $player = Player::create($input);
     $arr = ['status' => true,
        'message'=>"Cầu thủ đã lưu thành công",
        'data'=> new PlayerResource($player)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $player = Player::find($id);
        if (is_null($player)) {
           $arr = [
             'success' => false,
             'message' => 'Không có cầu thủ này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết cầu thủ ",
          'data'=> new PLayerResource($player)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, Player $player){
        $input = $request->all();
        $validator = Validator::make($input, [
           'doi_bong_id' => 'required', 'ten_cau_thu' => 'required','so_ao' => 'required','avatar'=>'required','vai_tro'=>'required','vi_tri'=>'required','so_tran_tham_gia'=>'required','so_ban_thang'=>'required','so_kien_tao'=>'required','so_the_vang'=>'required','so_the_do'=>'required','id_tai_khoan'=>'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $player->doi_bong_id = $input['doi_bong_id'];
        $player->ten_cau_thu = $input['ten_cau_thu'];
        $player->id_tai_khoan = $input['id_tai_khoan'];
        $player->avatar = $input['avatar'];
        $player->so_ao = $input['so_ao'];
        $player->vi_tri = $input['vi_tri'];
        $player->vai_tro = $input['vai_tro'];
        $player->so_tran_tham_gia = $input['so_tran_tham_gia'];
        $player->so_ban_thang = $input['so_ban_thang'];
        $player->so_kien_tao = $input['so_kien_tao'];
        $player->so_the_vang = $input['so_the_vang'];
        $player->so_the_do = $input['so_the_do'];
        $player->save();
        $arr = [
           'status' => true,
           'message' => 'Cầu thủ cập nhật thành công',
           'data' => new PlayerResource($player)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(Player $player){
        $player->delete();
        $arr = [
           'status' => true,
           'message' =>'Cầu thủ đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}