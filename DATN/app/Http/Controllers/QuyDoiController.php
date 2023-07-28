<?php

namespace App\Http\Controllers;

use App\Models\QuyDoi;
use App\Http\Resources\QuyDoi as QuyDoiResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class QuyDoiController extends Controller
{
   
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
    public function index() {
        $QuyDoi = QuyDoi::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách quỹ",
        'data'=>QuyDoiResource::collection($QuyDoi)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
       'doi_bong_id' => 'required', 'so_tien_quy' => 'required','nguoi_dong_tien'=>'required','danh_muc'=>'required','thoi_gian'=>'required','trang_thai'=>'required','tieu_de'=>'required'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $QuyDoi = QuyDoi::create($input);
     $arr = ['status' => true,
        'message'=>"Quỹ đội đã lưu thành công",
        'data'=> new QuyDoiResource($QuyDoi)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $QuyDoi = QuyDoi::find($id);
        if (is_null($QuyDoi)) {
           $arr = [
             'success' => false,
             'message' => 'Không có quỹ này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết quỹ ",
          'data'=> new QuyDoiResource($QuyDoi)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, QuyDoi $QuyDoi){
        $input = $request->all();
        $validator = Validator::make($input, [
         'doi_bong_id' => 'required', 'so_tien_quy' => 'required','nguoi_dong_tien'=>'required','thoi_gian'=>'required','danh_muc'=>'required','trang_thai'=>'required','tieu_de'=>'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $QuyDoi->doi_bong_id = $input['doi_bong_id'];
        $QuyDoi->nguoi_dong_tien=$input['nguoi_dong_tien'];
        $QuyDoi->tieu_de = $input['tieu_de'];
        $QuyDoi->trang_thai = $input['tang_thai'];
        $QuyDoi->danh_muc = $input['danh_muc'];
        $QuyDoi->thoi_gian = $input['thoi_gian'];
        $QuyDoi->so_tien_quy = $input['so_tien_quy'];
       
        $QuyDoi->save();
        $arr = [
           'status' => true,
           'message' => 'Quỹ cập nhật thành công',
           'data' => new QuyDoiResource($QuyDoi)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(QuyDoi $QuyDoi){
        $QuyDoi->delete();
        $arr = [
           'status' => true,
           'message' =>'Quỹ đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}