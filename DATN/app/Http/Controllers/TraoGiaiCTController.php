<?php

namespace App\Http\Controllers;

use App\Models\TraoGiaiCT;
use App\Http\Resources\TraoGiaiCT as TraoGiaiCTResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class TraoGiaiCTController extends Controller
{
   
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
    public function index() {
        $TraoGiaiCT = TraoGiaiCT::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách trao giải cầu thủ",
        'data'=>TraoGiaiCTResource::collection($TraoGiaiCT)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
       'cau_thu_id' => 'required', 'doi_bong_id' => 'required', 'tran_dau_id' => 'required', 'giai_thuong_id' => 'required'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $TraoGiaiCT = TraoGiaiCT::create($input);
     $arr = ['status' => true,
        'message'=>"Giải thưởng đã lưu thành công",
        'data'=> new TraoGiaiCTResource($TraoGiaiCT)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $TraoGiaiCT = TraoGiaiCT::find($id);
        if (is_null($TraoGiaiCT)) {
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
          'data'=> new TraoGiaiCTResource($TraoGiaiCT)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, TraoGiaiCT $TraoGiaiCT){
        $input = $request->all();
        $validator = Validator::make($input, [
            'cau_thu_id' => 'required', 'doi_bong_id' => 'required', 'tran_dau_id' => 'required', 'giai_thuong_id' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $TraoGiaiCT->cau_thu_id = $input['cau_thu_id'];
        $TraoGiaiCT->tran_dau_id = $input['tran_dau_id'];
        $TraoGiaiCT->doi_bong_id = $input['doi_bong_id'];
        $TraoGiaiCT->giai_thuong_id = $input['giai_thuong_id'];
        $TraoGiaiCT->save();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật thành công',
           'data' => new TraoGiaiCTResource($TraoGiaiCT)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(TraoGiaiCT $TraoGiaiCT){
        $TraoGiaiCT->delete();
        $arr = [
           'status' => true,
           'message' =>'Giải thưởng đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}