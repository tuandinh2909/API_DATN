<?php

namespace App\Http\Controllers;

use App\Models\LichSuQuy;
use App\Http\Resources\LichSuQuy as LichSuQuyResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class LichSuQuyController extends Controller
{
   

  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
    public function index() {
        $LichSuQuy = LichSuQuy::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách lịch sử quỹ",
        'data'=>LichSuQuyResource::collection($LichSuQuy)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
       'quy_doi_id' => 'required', 'noi_dung' => 'required', 'so_tien' => 'required'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $LichSuQuy = LichSuQuy::create($input);
     $arr = ['status' => true,
        'message'=>"Lịch sử quỹ đã lưu thành công",
        'data'=> new LichSuQuyResource($LichSuQuy)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $LichSuQuy = LichSuQuy::find($id);
        if (is_null($LichSuQuy)) {
           $arr = [
             'success' => false,
             'message' => 'Không có lịch sử này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết lịch sử quỹ ",
          'data'=> new LichSuQuyResource($LichSuQuy)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, LichSuQuy $LichSuQuy){
        $input = $request->all();
        $validator = Validator::make($input, [
           'quy_doi_id' => 'required', 'noi_dung' => 'required', 'so_tien' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $LichSuQuy->doi_bong_id = $input['quy_doi_id'];
        $LichSuQuy->so_tien_quy = $input['noi_dung'];
        $LichSuQuy->so_tien_quy = $input['so_tien'];
        $LichSuQuy->save();
        $arr = [
           'status' => true,
           'message' => 'Quỹ cập nhật thành công',
           'data' => new LichSuQuyResource($LichSuQuy)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(LichSuQuy $LichSuQuy){
        $LichSuQuy->delete();
        $arr = [
           'status' => true,
           'message' =>'Quỹ đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}