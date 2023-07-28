<?php

namespace App\Http\Controllers;

use App\Models\KQTranDau;
use App\Http\Resources\KQTranDau as KQTranDauResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class KQTranDauController extends Controller
{
   
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
    public function index() {
        $KQTranDau = KQTranDau::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách KQ trận đấu",
        'data'=>KQTranDauResource::collection($KQTranDau)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
       'doi_bong_1_id' => 'required', 'doi_bong_2_id' => 'required','giai_dau_id'=>'required','du_lieu_tran_dau_id'=>'required','ty_so'=>'required','doi_thang_id'=>'required'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $KQTranDau = KQTranDau::create($input);
     $arr = ['status' => true,
        'message'=>" KQ Trận đấu đã lưu thành công",
        'data'=> new TranDauResource($TranDau)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $KQTranDau = KQTranDau::find($id);
        if (is_null($KQTranDau)) {
           $arr = [
             'success' => false,
             'message' => 'Không có KQ trận đấu này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết KQ trận đấu ",
          'data'=> new KQTranDauResource($KQTranDau)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, TranDau $TranDau){
        $input = $request->all();
        $validator = Validator::make($input, [
            'doi_bong_1_id' => 'required', 'doi_bong_2_id' => 'required','giai_dau_id'=>'required','du_lieu_tran_dau_id'=>'required','ty_so'=>'required','doi_thang_id'=>'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $KQTranDau->doi_bong_1_id = $input['doi_bong_1_id'];
        $KQTranDau->doi_bong_2_id = $input['doi_bong_2_id'];
        $KQTranDau->giai_dau_id = $input['giai_dau_id'];
        $KQTranDau->du_lieu_tran_dau_id = $input['du_lieu_tran_dau_id'];
        $KQTranDau->ty_so = $input['ty_so'];
        $KQTranDau->doi_thang_id = $input['doi_thang_id'];
      
        $KQTranDau->save();
        $arr = [
           'status' => true,
           'message' => 'KQ Trận đấu cập nhật thành công',
           'data' => new KQTranDauResource($KQTranDau)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(KQTranDau $KQTranDau){
        $TranDau->delete();
        $arr = [
           'status' => true,
           'message' =>'KQ Trận đấu đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}