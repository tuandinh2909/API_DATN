<?php

namespace App\Http\Controllers;

use App\Models\ChiTietTomTat;
use App\Http\Resources\ChiTietTomTat as ChiTietTomTatResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class ChiTietTomTatController extends Controller
{
   
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
  public function index() {
    $ChiTietTomTat = ChiTietTomTat::all();
    $arr = [
    'status' => true,
    'message' => "Danh sách giải đấu",
    'data'=>ChiTietTomTatResource::collection($ChiTietTomTat)
    ];
     return response()->json($arr, 200);
  }

public function store(Request $request) {
 $input = $request->all(); 
 $validator = Validator::make($input, [
   'loai_thong_tin' => 'required','giai_dau_id' => 'required', 'tran_dau_id' => 'required', 'doi_bong_id' => 'required','cau_thu_id' => 'required', 'thoi_gian'=>'required'
 ]);
 if($validator->fails()){
    $arr = [
      'success' => false,
      'message' => 'Lỗi kiểm tra dữ liệu',
      'data' => $validator->errors()
    ];
    return response()->json($arr, 200);
 }
 $ChiTietTomTat = ChiTietTomTat::create($input);
 $arr = ['status' => true,
    'message'=>"Giải đấu đã lưu thành công",
    'data'=> new ChiTietTomTatResource($ChiTietTomTat)
 ];
 return response()->json($arr, 201);
}

public function show($id) {
    $ChiTietTomTat = ChiTietTomTat::find($id);
    if (is_null($ChiTietTomTat)) {
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
      'data'=> new ChiTietTomTatResource($ChiTietTomTat)
    ];
    return response()->json($arr, 201);
   }

public function update(Request $request, ChiTietTomTat $ChiTietTomTat){
    $input = $request->all();
    $validator = Validator::make($input, [
      'loai_thong_tin' => 'required','giai_dau_id' => 'required', 'tran_dau_id' => 'required', 'doi_bong_id' => 'required','cau_thu_id' => 'required', 'thoi_gian'=>'required'
    ]);
    if($validator->fails()){
       $arr = [
         'success' => false,
         'message' => 'Lỗi kiểm tra dữ liệu',
         'data' => $validator->errors()
       ];
       return response()->json($arr, 200);
    }
    $ChiTietTomTat->loai_thong_tin = $input['loai_thong_tin'];
    $ChiTietTomTat->giai_dau_id = $input['giai_dau_id'];
    $ChiTietTomTat->tran_dau_id = $input['tran_dau_id'];
    $ChiTietTomTat->doi_bong_id = $input['doi_bong_id'];
    $ChiTietTomTat->cau_thu_id = $input['cau_thu_id'];
    $ChiTietTomTat->thoi_gian = $input['thoi_gian'];
    $ChiTietTomTat->save();
    $arr = [
       'status' => true,
       'message' => 'Giải đấu cập nhật thành công',
       'data' => new ChiTietTomTatResource($ChiTietTomTat)
    ];
    return response()->json($arr, 200);
  }

public function destroy(ChiTietTomTat $ChiTietTomTat){
    $ChiTietTomTat->delete();
    $arr = [
       'status' => true,
       'message' =>'Giải đấu đã được xóa',
       'data' => [],
    ];
    return response()->json($arr, 200);
 }
}