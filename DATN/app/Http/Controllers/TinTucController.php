<?php

namespace App\Http\Controllers;

use App\Models\TinTuc;
use App\Http\Resources\TinTuc as TinTucResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class TinTucController extends Controller
{
   
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
    public function index() {
        $TinTuc = TinTuc::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách tin tức",
        'data'=>TinTucResource::collection($TinTuc)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
       'tieu_de' => 'required', 'noi_dung' => 'required'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $TinTuc = TinTuc::create($input);
     $arr = ['status' => true,
        'message'=>"Lịch sử quỹ đã lưu thành công",
        'data'=> new TinTucResource($TinTuc)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $TinTuc = TinTuc::find($id);
        if (is_null($TinTuc)) {
           $arr = [
             'success' => false,
             'message' => 'Không có tin tức này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết tin tức ",
          'data'=> new TinTucResource($TinTuc)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, TinTuc $TinTuc){
        $input = $request->all();
        $validator = Validator::make($input, [
           'tieu_de' => 'required', 'noi_dung' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $TinTuc->tieu_de = $input['tieu_de'];
        $TinTuc->noi_dung = $input['noi_dung'];
       
        $TinTuc->save();
        $arr = [
           'status' => true,
           'message' => 'Tin tức cập nhật thành công',
           'data' => new TinTucResource($TinTuc)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(TinTuc $TinTuc){
        $TinTuc->delete();
        $arr = [
           'status' => true,
           'message' =>'Tin tức đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}