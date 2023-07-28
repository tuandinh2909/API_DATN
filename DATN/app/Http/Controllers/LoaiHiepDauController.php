<?php

namespace App\Http\Controllers;

use App\Models\LoaiHiepDau;
use App\Http\Resources\LoaiHiepDau as LoaiHiepDauResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class LoaiHiepDauController extends Controller
{
   
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
    public function index() {
        $LoaiHiepDau = LoaiHiepDau::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách loại hiệp đấu",
        'data'=>LoaiHiepDauResource::collection($LoaiHiepDau)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
       'ten_hiep_dau' => 'required'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $LoaiHiepDau = LoaiHiepDau::create($input);
     $arr = ['status' => true,
        'message'=>"Loại hiệp đấu đã lưu thành công",
        'data'=> new LoaiHiepDauResource($LoaiHiepDau)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $LoaiHiepDau = LoaiHiepDau::find($id);
        if (is_null($LoaiHiepDau)) {
           $arr = [
             'success' => false,
             'message' => 'Không có loại hiệp đấu này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết loại hiệp đấu ",
          'data'=> new LoaiHiepDauResource($LoaiHiepDau)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, LoaiHiepDau $LoaiHiepDau){
        $input = $request->all();
        $validator = Validator::make($input, [
           'ten_hiep_dau' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $LoaiHiepDau->ten_hiep_dau = $input['ten_hiep_dau'];
      
        $LoaiHiepDau->save();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật thành công',
           'data' => new LoaiHiepDauResource($LoaiHiepDau)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(LoaiHiepDau $LoaiHiepDau){
        $LoaiHiepDau->delete();
        $arr = [
           'status' => true,
           'message' =>'Loại hiệp đấu đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}