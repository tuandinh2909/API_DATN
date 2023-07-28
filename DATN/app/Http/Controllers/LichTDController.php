<?php

namespace App\Http\Controllers;

use App\Models\LichTD;
use App\Http\Resources\LichTD as LichTDResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class LichTDController extends Controller
{
   
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
    public function index() {
        $LichTD = LichTD::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách lịch thi đấu",
        'data'=>LichTDResource::collection($LichTD)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
       'ma_tran_dau' => 'required','doi_bong_1_id' => 'required', 'doi_bong_2_id' => 'required', 'giai_dau_id' => 'required', 'thoi_gian' => 'required', 'ngay_dien_ra' => 'required','trang_thai_tran_dau' => 'required', 'dia_diem' => 'required'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $LichTD = LichTD::create($input);
     $arr = ['status' => true,
        'message'=>"Lịch TD đã lưu thành công",
        'data'=> new LichTDResource($LichTD)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $LichTD = LichTD::find($id);
        if (is_null($LichTD)) {
           $arr = [
             'success' => false,
             'message' => 'Không có quỹ này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết lịch thi đấu ",
          'data'=> new LichTDResource($LichTD)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, LichTD $LichTD){
        $input = $request->all();
        $validator = Validator::make($input, [
          'ma_tran_dau' => 'required','doi_bong_1_id' => 'required', 'doi_bong_2_id' => 'required', 'giai_dau_id' => 'required', 'thoi_gian' => 'required', 'ngay_dien_ra' => 'required', 'trang_thai_tran_dau' => 'required', 'dia_diem' => 'required'

        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $LichTD->ma_tran_dau = $input['ma_tran_dau'];
        $LichTD->doi_bong_1_id = $input['doi_bong_1_id'];
        $LichTD->doi_bong_2_id = $input['doi_bong_2_id'];
        $LichTD->giai_dau_id = $input['giai_dau_id'];
        $LichTD->thoi_gian = $input['thoi_gian'];
        $LichTD->ngay_dien_ra = $input['ngay_dien_ra'];
        $LichTD->trang_thai_tran_dau = $input['trang_thai_tran_dau'];
        $LichTD->dia_diem = $input['dia_diem'];
        $LichTD->save();
        $arr = [
           'status' => true,
           'message' => 'Lịch thi đấu cập nhật thành công',
           'data' => new LichTDResource($LichTD)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(LichTD $LichTD){
        $LichTD->delete();
        $arr = [
           'status' => true,
           'message' =>'Lịch TD đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}