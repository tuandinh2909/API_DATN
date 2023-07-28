<?php

namespace App\Http\Controllers;

use App\Models\InfoUser;
use App\Http\Resources\InfoUser as InfoUserResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class InfoUserController extends Controller
{
  
  public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    public function index() {
        $InfoUser = InfoUser::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách thông tin User",
        'data'=>InfoUserResource::collection($InfoUser)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
      'id_tai_khoan'=>'required', 'hoten' => 'required', 'khoa' => 'required','lop'=>'required','sdt'=>'required','gioithieu'=>'required'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $InfoUser = InfoUser::create($input);
     $arr = ['status' => true,
        'message'=>"Thông tin đã lưu thành công",
        'data'=> new InfoUserResource($InfoUser)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $InfoUser = InfoUser::find($id);
        if (is_null($InfoUser)) {
           $arr = [
             'success' => false,
             'message' => 'Không có thông tin này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết thông tin ",
          'data'=> new InfoUserResource($InfoUser)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, InfoUser $InfoUser){
        $input = $request->all();
        $validator = Validator::make($input, [
          'id_tai_khoan'=>'required', 'hoten' => 'required', 'khoa' => 'required','lop' => 'required','gioithieu'=>'required','sdt'=>'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
          $InfoUser->id_tai_khoan = $input['id_tai_khoan'];
        $InfoUser->hoten = $input['hoten'];
        $InfoUser->khoa = $input['khoa'];
        $InfoUser->lop = $input['lop'];
        $InfoUser->sdt = $input['sdt'];
        $InfoUser->thoidiem = $input['thoidiem'];
        $InfoUser->save();
        $arr = [
           'status' => true,
           'message' => 'Thông tin cập nhật thành công',
           'data' => new InfoUserResource($InfoUser)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(InfoUser $InfoUser){
        $InfoUser->delete();
        $arr = [
           'status' => true,
           'message' =>'Thông tin đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}