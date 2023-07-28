<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use App\Http\Resources\TaiKhoan as TaiKhoanResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class TaiKhoanController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }


    public function index() {
        $taikhoan = TaiKhoan::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách tài khoản",
        'data'=>TaiKhoanResource::collection($taikhoan)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
       'matkhau' => 'required','email'=>'required|email',
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $taikhoan = TaiKhoan::create($input);
     $arr = ['status' => true,
        'message'=>"Tài khoản đã lưu thành công",
        'data'=> new TaiKhoanResource($taikhoan)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $taikhoan = TaiKhoan::find($id);
        if (is_null($taikhoan)) {
           $arr = [
             'success' => false,
             'message' => 'Không có tài khoản này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết tài khoản ",
          'data'=> new TaiKhoanResource($taikhoan)
        ];
        return response()->json($arr, 201);
       }

       public function update(Request $request, $id){
        $input = $request->all();
        $validator = Validator::make($input, [
          'matkhau' => 'required',
          'email' => 'required'
        ]);
    
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
    
        $taikhoan = TaiKhoan::find($id);
        if (is_null($taikhoan)) {
           $arr = [
             'success' => false,
             'message' => 'Không có tài khoản này',
             'data' => []
           ];
           return response()->json($arr, 200);
        }
    
        $taikhoan->matkhau = $input['matkhau'];
        $taikhoan->loai_tai_khoan = $input['loai_tai_khoan'];
        $taikhoan->email = $input['email'];
        $taikhoan->hoten = $input['hoten'];
        $taikhoan->sdt = $input['sdt'];
        $taikhoan->lop = $input['lop'];
        $taikhoan->avatar = $input['avatar'];
        $taikhoan->trang_thai = $input['trang_thai'];
        $taikhoan->save();
    
        $arr = [
           'status' => true,
           'message' => 'Tài khoản cập nhật thành công',
           'data' => new TaiKhoanResource($taikhoan)
        ];
        return response()->json($arr, 200);
    }
    

    public function destroy(TaiKhoan $taikhoan){
        $taikhoan->delete();
        $arr = [
           'status' => true,
           'message' =>'Tài khoản đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}