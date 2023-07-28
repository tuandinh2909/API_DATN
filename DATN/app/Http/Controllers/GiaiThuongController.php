<?php

namespace App\Http\Controllers;

use App\Models\GiaiThuong;
use App\Http\Resources\GiaiThuong as GiaiThuongResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class GiaiThuongController extends Controller
{
   
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
    public function index() {
        $GiaiThuong = GiaiThuong::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách giải thưởng",
        'data'=>GiaiThuongResource::collection($GiaiThuong)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
       'ten_giai_thuong' => 'required', 'so_tien_thuong' => 'required'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $GiaiThuong = GiaiThuong::create($input);
     $arr = ['status' => true,
        'message'=>"Giải thưởng đã lưu thành công",
        'data'=> new GiaiThuongResource($GiaiThuong)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $GiaiThuong = GiaiThuong::find($id);
        if (is_null($GiaiThuong)) {
           $arr = [
             'success' => false,
             'message' => 'Không có giải thưởng này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết giải thưởng quỹ ",
          'data'=> new GiaiThuongResource($GiaiThuong)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, GiaiThuong $GiaiThuong){
        $input = $request->all();
        $validator = Validator::make($input, [
           'ten_giai_thuong' => 'required', 'so_tien_thuong' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $GiaiThuong->ten_giai_thuong = $input['ten_giai_thuong'];
        $GiaiThuong->so_tien_thuong = $input['so_tien_thuong'];
       
        $GiaiThuong->save();
        $arr = [
           'status' => true,
           'message' => 'Giải thưởng cập nhật thành công',
           'data' => new GiaiThuongResource($GiaiThuong)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(GiaiThuong $GiaiThuong){
        $GiaiThuong->delete();
        $arr = [
           'status' => true,
           'message' =>'Giải thưởng đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}