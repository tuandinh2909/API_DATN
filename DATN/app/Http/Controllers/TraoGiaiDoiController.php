<?php

namespace App\Http\Controllers;

use App\Models\TraoGiaiDoi;
use App\Http\Resources\TraoGiaiDoi as TraoGiaiDoiResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class TraoGiaiDoiController extends Controller
{
   
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
    public function index() {
        $TraoGiaiDoi = TraoGiaiDoi::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách trao giải đội",
        'data'=>TraoGiaiDoiResource::collection($TraoGiaiDoi)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
       'hang' => 'required', 'giai_dau_id' => 'required','doi_bong_id' => 'required','giai_thuong_id' => 'required'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $TraoGiaiDoi = TraoGiaiDoi::create($input);
     $arr = ['status' => true,
        'message'=>"Trao giải đội đã lưu thành công",
        'data'=> new TraoGiaiDoiResource($TraoGiaiDoi)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $TraoGiaiDoi = TraoGiaiDoi::find($id);
        if (is_null($TraoGiaiDoi)) {
           $arr = [
             'success' => false,
             'message' => 'Không có trao giải đội này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết trao giải đội ",
          'data'=> new TraoGiaiDoiResource($TraoGiaiDoi)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, TraoGiaiDoi $TraoGiaiDoi){
        $input = $request->all();
        $validator = Validator::make($input, [
            'hang' => 'required', 'giai_dau_id' => 'required','doi_bong_id' => 'required','giai_thuong_id' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $TraoGiaiDoi->hang = $input['hang'];
        $TraoGiaiDoi->giai_dau_id = $input['giai_dau_id'];
        $TraoGiaiDoi->doi_bong_id = $input['doi_bong_id'];
        $TraoGiaiDoi->giai_thuong_id = $input['giai_thuong_id'];
        $TraoGiaiDoi->save();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật thành công',
           'data' => new TraoGiaiDoiResource($TraoGiaiDoi)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(TraoGiaiDoi $TraoGiaiDoi){
        $TraoGiaiDoi->delete();
        $arr = [
           'status' => true,
           'message' =>'Trao giải đội đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}