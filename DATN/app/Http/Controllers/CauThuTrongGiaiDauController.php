<?php

namespace App\Http\Controllers;

use App\Models\CauThuTrongGiaiDau;
use App\Http\Resources\CauThuTrongGiaiDau as CauThuTrongGiaiDauResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class CauThuTrongGiaiDauController extends Controller
{
   
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
  public function index() {
    $CauThuTrongGiaiDau = CauThuTrongGiaiDau::all();
    $arr = [
    'status' => true,
    'message' => "Cầu thủ trong giải đấu",
    'data'=>CauThuTrongGiaiDauResource::collection($CauThuTrongGiaiDau)
    ];
     return response()->json($arr, 200);
  }

public function store(Request $request) {
 $input = $request->all(); 
 $validator = Validator::make($input, [
   'id_cau_thu' => 'required','id_giai_dau' => 'required', 'so_tran_tham_gia' => 'required', 'so_ban_thang' => 'required','so_the_vang' => 'required', 'so_the_do'=>'required'
 ]);
 if($validator->fails()){
    $arr = [
      'success' => false,
      'message' => 'Lỗi kiểm tra dữ liệu',
      'data' => $validator->errors()
    ];
    return response()->json($arr, 200);
 }
 $CauThuTrongGiaiDau = CauThuTrongGiaiDau::create($input);
 $arr = ['status' => true,
    'message'=>"CT trong GD đã lưu thành công",
    'data'=> new CauThuTrongGiaiDauResource($CauThuTrongGiaiDau)
 ];
 return response()->json($arr, 201);
}

public function show($id) {
    $CauThuTrongGiaiDau = CauThuTrongGiaiDau::find($id);
    if (is_null($CauThuTrongGiaiDau)) {
       $arr = [
         'success' => false,
         'message' => 'Không có giải đấu này',
         'data' => []
       ];
       return response()->json($arr, 200);
    }
    $arr = [
      'status' => true,
      'message' => "Chi tiết cầu thủ trong GD ",
      'data'=> new CauThuTrongGiaiDauResource($CauThuTrongGiaiDau)
    ];
    return response()->json($arr, 201);
   }

public function update(Request $request, CauThuTrongGiaiDau $CauThuTrongGiaiDau){
    $input = $request->all();
    $validator = Validator::make($input, [
        'id_cau_thu' => 'required','id_giai_dau' => 'required', 'so_tran_tham_gia' => 'required', 'so_ban_thang' => 'required','so_the_vang' => 'required', 'so_the_do'=>'required'
    ]);
    if($validator->fails()){
       $arr = [
         'success' => false,
         'message' => 'Lỗi kiểm tra dữ liệu',
         'data' => $validator->errors()
       ];
       return response()->json($arr, 200);
    }
    $CauThuTrongGiaiDau->id_cau_thu = $input['id_cau_thu'];
    $CauThuTrongGiaiDau->id_giai_dau = $input['id_giai_dau'];
    $CauThuTrongGiaiDau->so_tran_tham_gia = $input['so_tran_tham_gia'];
    $CauThuTrongGiaiDau->so_ban_thang = $input['so_ban_thang'];
    $CauThuTrongGiaiDau->so_the_vang = $input['so_the_vang'];
    $CauThuTrongGiaiDau->so_the_do = $input['so_the_do'];
    $CauThuTrongGiaiDau->save();
    $arr = [
       'status' => true,
       'message' => 'CT trong GD cập nhật thành công',
       'data' => new CauThuTrongGiaiDauResource($CauThuTrongGiaiDau)
    ];
    return response()->json($arr, 200);
  }

public function destroy(CauThuTrongGiaiDau $CauThuTrongGiaiDau){
    $CauThuTrongGiaiDau->delete();
    $arr = [
       'status' => true,
       'message' =>'CT trong GD đã được xóa',
       'data' => [],
    ];
    return response()->json($arr, 200);
 }
}