<?php

namespace App\Http\Controllers;

use App\Models\Football;
use App\Http\Resources\Football as FootballResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class FootballController extends Controller
{
   
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
    public function index() {
        $football = Football::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách đội bóng",
        'data'=>FootballResource::collection($football)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
       'nguoi_quan_ly_id' => 'required','khoa'=>'required','lop'=>'required','sl_thanh_vien'=>'required', 'ten_doi_bong' => 'required','logo'=>'required','so_diem'=>'required','so_tran_dau'=>'required','so_tran_thang'=>'required','so_tran_thua'=>'required','so_ban_thang'=>'required','so_ban_thua'=>'required','trang_thai_dang_ky'=>'required'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $football = Football::create($input);
     $arr = ['status' => true,
        'message'=>"Đội bóng đã lưu thành công",
        'data'=> new FootballResource($football)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $football = Football::find($id);
        if (is_null($football)) {
           $arr = [
             'success' => false,
             'message' => 'Không có đội bóng này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết đội bóng ",
          'data'=> new FootballResource($football)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, Football $football){
        $input = $request->all();
        $validator = Validator::make($input, [
          'nguoi_quan_ly_id' => 'required','khoa'=>'required','lop'=>'required','sl_thanh_vien'=>'required', 'ten_doi_bong' => 'required','logo'=>'required','so_diem'=>'required','so_tran_dau'=>'required','so_tran_thang'=>'required','so_tran_thua'=>'required','so_ban_thang'=>'required','so_ban_thua'=>'required','trang_thai_dang_ky'=>'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $football->nguoi_quan_ly_id = $input['nguoi_quan_ly_id'];
        $football->ten_doi_bong = $input['ten_doi_bong'];
        $football->logo = $input['logo'];
        $football->so_diem = $input['so_diem'];
        $football->so_tran_dau = $input['so_tran_dau'];
        $football->so_tran_thang = $input['so_tran_thang'];
        $football->so_tran_thua = $input['so_tran_thua'];
        $football->so_ban_thang = $input['so_ban_thang'];
        $football->so_ban_thua = $input['so_ban_thua'];
        $football->trang_thai_dang_ky = $input['trang_thai_dang_ky'];
        $football->sl_thanh_vien = $input['sl_thanh_vien'];
        $football->save();
        $arr = [
           'status' => true,
           'message' => 'Đội bóng cập nhật thành công',
           'data' => new FootballResource($football)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(Football $football){
        $football->delete();
        $arr = [
           'status' => true,
           'message' =>'Đội bóng đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}