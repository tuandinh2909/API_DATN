<?php

namespace App\Http\Controllers;

use App\Models\TranDau;
use App\Http\Resources\TranDau as TranDauResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class TranDauController extends Controller
{
   
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
    public function index() {
        $TranDau = TranDau::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách trận đấu",
        'data'=>TranDauResource::collection($TranDau)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
       'trong_tai_1_id'=>'required','trong_tai_2_id'=>'required','lich_thi_dau_id'=>'required','ti_so'=>'required','tong_so_the'=>'required','so_the_vang'=>'required','so_the_do'=>'required','bu_gio'=>'required',
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $TranDau = TranDau::create($input);
     $arr = ['status' => true,
        'message'=>" Trận đấu đã lưu thành công",
        'data'=> new TranDauResource($TranDau)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $TranDau = TranDau::find($id);
        if (is_null($TranDau)) {
           $arr = [
             'success' => false,
             'message' => 'Không có trận đấu này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết trận đấu ",
          'data'=> new TranDauResource($TranDau)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, TranDau $TranDau){
        $input = $request->all();
        $validator = Validator::make($input, [
          'trong_tai_1_id'=>'required','trong_tai_2_id'=>'required','lich_thi_dau_id'=>'required','ti_so'=>'required','tong_so_the'=>'required','so_the_vang'=>'required','so_the_do'=>'required','bu_gio'=>'required',
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $TranDau->trong_tai_1_id = $input['trong_tai_1_id'];
        $TranDau->trong_tai_2_id = $input['trong_tai_2_id'];
        $TranDau->lich_thi_dau_id = $input['lich_thi_dau_id'];
        $TranDau->tong_so_the = $input['tong_so_the'];
        $TranDau->so_the_vang = $input['so_the_vang'];
        $TranDau->ti_so = $input['ti_so'];
        $TranDau->so_the_do = $input['so_the_do'];
        $TranDau->bu_gio = $input['bu_gio'];
        $TranDau->save();
        $arr = [
           'status' => true,
           'message' => 'Trận đấu cập nhật thành công',
           'data' => new TranDauResource($TranDau)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(TranDau $TranDau){
        $TranDau->delete();
        $arr = [
           'status' => true,
           'message' =>'Trận đấu đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}