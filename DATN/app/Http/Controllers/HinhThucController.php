<?php

namespace App\Http\Controllers;

use App\Models\HinhThuc;
use App\Http\Resources\HinhThuc as HinhThucResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class HinhThucController extends Controller
{
   public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::check()) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            
            return $next($request);
        });
    }

    public function index() {
        $HinhThuc = HinhThuc::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách hình thức",
        'data'=>HinhThucResource::collection($HinhThuc)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
    'ten_hinh_thuc' => 'required','noi_dung' => 'required','so_tran_toi_thieu' => 'required','so_doi_toi_thieu' => 'required'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $HinhThuc = HinhThuc::create($input);
     $arr = ['status' => true,
        'message'=>"Hình thức đã lưu thành công",
        'data'=> new HinhThucResource($HinhThuc)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $HinhThuc = HinhThuc::find($id);
        if (is_null($HinhThuc)) {
           $arr = [
             'success' => false,
             'message' => 'Không có hình thức này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết hình thức ",
          'data'=> new HinhThucResource($HinhThuc)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, HinhThuc $HinhThuc){
        $input = $request->all();
        $validator = Validator::make($input, [
   'ten_hinh_thuc' => 'required','noi_dung' => 'required','so_tran_toi_thieu' => 'required','so_doi_toi_thieu' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $HinhThuc->id = $input['id'];
        $HinhThuc->ten_hinh_thuc = $input['ten_hinh_thuc'];
        $HinhThuc->noi_dung = $input['noi_dung'];
        $HinhThuc->so_tran_toi_thieu = $input['so_tran_toi_thieu'];
        $HinhThuc->so_doi_toi_thieu = $input['so_doi_toi_thieu'];
      
        $HinhThuc->save();
        $arr = [
           'status' => true,
           'message' => 'Hình thức cập nhật thành công',
           'data' => new HinhThucResource($HinhThuc)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(HinhThuc $HinhThuc){
        $HinhThuc->delete();
        $arr = [
           'status' => true,
           'message' =>'Hình thức đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}