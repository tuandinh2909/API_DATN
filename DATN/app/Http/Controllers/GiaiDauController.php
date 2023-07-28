<?php

namespace App\Http\Controllers;

use App\Models\GiaiDau;
use App\Http\Resources\GiaiDau as GiaiDauResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class GiaiDauController extends Controller
{
   
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
  public function index() {
    $GiaiDau = GiaiDau::all();
    $arr = [
    'status' => true,
    'message' => "Danh sách giải đấu",
    'data'=>GiaiDauResource::collection($GiaiDau)
    ];
     return response()->json($arr, 200);
  }

public function store(Request $request) {
 $input = $request->all(); 
 $validator = Validator::make($input, [
  'ten_giai_dau' => 'required', 'hinh_thuc_dau_id' => 'required', 'ban_to_chuc' => 'required', 'san_dau' => 'required', 'ngay_bat_dau'=>'required','ngay_ket_thuc'=>'required','so_luong_doi_bong'=>'required', 'so_bang_dau'=>'required', 'so_doi_vao_vong_trong'=>'required', 'loai_san'=>'required','so_vong_dau'=>'required', 'so_tran_da_dau' => 'required'
 ]);
 if($validator->fails()){
    $arr = [
      'success' => false,
      'message' => 'Lỗi kiểm tra dữ liệu',
      'data' => $validator->errors()
    ];
    return response()->json($arr, 200);
 }
 $GiaiDau = GiaiDau::create($input);
 $arr = ['status' => true,
    'message'=>"Giải đấu đã lưu thành công",
    'data'=> new GiaiDauResource($GiaiDau)
 ];
 return response()->json($arr, 201);
}

public function show($id) {
    $GiaiDau = GiaiDau::find($id);
    if (is_null($GiaiDau)) {
       $arr = [
         'success' => false,
         'message' => 'Không có giải đấu này',
         'dara' => []
       ];
       return response()->json($arr, 200);
    }
    $arr = [
      'status' => true,
      'message' => "Chi tiết giải đấu ",
      'data'=> new GiaiDauResource($GiaiDau)
    ];
    return response()->json($arr, 201);
   }

public function update(Request $request, GiaiDau $GiaiDau){
    $input = $request->all();
    $validator = Validator::make($input, [
     'ten_giai_dau' => 'required', 'hinh_thuc_dau_id' => 'required', 'ban_to_chuc' => 'required', 'san_dau' => 'required', 'ngay_bat_dau'=>'required','ngay_ket_thuc'=>'required','so_luong_doi_bong'=>'required', 'so_bang_dau'=>'required', 'so_doi_vao_vong_trong'=>'required', 'loai_san'=>'required','so_vong_dau'=>'required', 'so_tran_da_dau' => 'required'
    ]);
    if($validator->fails()){
       $arr = [
         'success' => false,
         'message' => 'Lỗi kiểm tra dữ liệu',
         'data' => $validator->errors()
       ];
       return response()->json($arr, 200);
    }
    $GiaiDau->ten_giai_dau = $input['ten_giai_dau'];
    $GiaiDau->hinh_thuc_dau_id = $input['hinh_thuc_dau_id'];
    $GiaiDau->ban_to_chuc = $input['ban_to_chuc'];
    $GiaiDau->san_dau = $input['san_dau'];
    $GiaiDau->ngay_bat_dau = $input['ngay_bat_dau'];
    $GiaiDau->ngay_ket_thuc = $input['ngay_ket_thuc'];
    $GiaiDau->so_luong_doi_bong = $input['so_luong_doi_bong'];
    $GiaiDau->so_vong_dau = $input['so_vong_dau'];
    $GiaiDau->so_bang_dau = $input['so_bang_dau'];
    $GiaiDau->so_doi_vao_vong_trong = $input['so_doi_vao_vong_trong'];
    $GiaiDau->loai_san = $input['loai_san'];
    $GiaiDau->so_tran_da_dau = $input['so_tran_da_dau'];
    $GiaiDau->save();
    $arr = [
       'status' => true,
       'message' => 'Giải đấu cập nhật thành công',
       'data' => new GiaiDauResource($GiaiDau)
    ];
    return response()->json($arr, 200);
  }

public function destroy(GiaiDau $GiaiDau){
    $GiaiDau->delete();
    $arr = [
       'status' => true,
       'message' =>'Giải đấu đã được xóa',
       'data' => [],
    ];
    return response()->json($arr, 200);
 }
}