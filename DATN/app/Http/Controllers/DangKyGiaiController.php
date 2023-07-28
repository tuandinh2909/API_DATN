<?php

namespace App\Http\Controllers;

use App\Models\DangKyGiai;
use App\Http\Resources\DangKyGiai as DangKyGiaiResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class DangKyGiaiController extends Controller
{
   
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
    public function index() {
        $DangKyGiai = DangKyGiai::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách đăng ký giải",
        'data'=>DangKyGiaiResource::collection($DangKyGiai)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
       'doi_bong_id' => 'required', 'giai_dau_id' => 'required','ngay_dang_ky'=>'required','trang_thai_dang_ky'=>'required','noi_dung'=>'required','trang_thai_tb'=>'required'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $DangKyGiai = DangKyGiai::create($input);
     $arr = ['status' => true,
        'message'=>"Đăng ký thành công thành công",
        'data'=> new DangKyGiaiResource($DangKyGiai)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $DangKyGiai = DangKyGiai::find($id);
        if (is_null($DangKyGiai)) {
           $arr = [
             'success' => false,
             'message' => 'Không có đội này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết đội đăng ký ",
          'data'=> new DangKyGiaiResource($DangKyGiai)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, DangKyGiai $DangKyGiai){
        $input = $request->all();
        $validator = Validator::make($input, [
           'trang_thai_dang_ky'=>'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
      //   $DangKyGiai->doi_bong_id = $input['doi_bong_id'];
      //   $DangKyGiai->giai_dau_id = $input['giai_dau_id'];
      //   $DangKyGiai->ngay_dang_ky = $input['ngay_dang_ky'];
        $DangKyGiai->trang_thai_dang_ky = $input['trang_thai_dang_ky'];
        $DangKyGiai->noi_dung = $input['noi_dung'];
        $DangKyGiai->trang_thai_tb = $input['trang_thai_tb'];
        $DangKyGiai->save();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật thành công',
           'data' => new DangKyGiaiResource($DangKyGiai)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(DangKyGiai $DangKyGiai){
        $DangKyGiai->delete();
        $arr = [
           'status' => true,
           'message' =>'Xoá thành công',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}