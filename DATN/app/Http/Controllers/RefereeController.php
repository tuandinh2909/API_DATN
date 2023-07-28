<?php

namespace App\Http\Controllers;

use App\Models\Referee;
use App\Http\Resources\Referee as RefereeResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class RefereeController extends Controller
{
   
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
    public function index() {
        $referee = Referee::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách trọng tài",
        'data'=>RefereeResource::collection($referee)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
       'ho_ten' => 'required', 'the_phat' => 'required','phat_den'=>'required','tong_so_tran'=>'required','vi_tri'=>'required'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $referee = Referee::create($input);
     $arr = ['status' => true,
        'message'=>"Trọng tài đã lưu thành công",
        'data'=> new RefereeResource($referee)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $referee = Referee::find($id);
        if (is_null($referee)) {
           $arr = [
             'success' => false,
             'message' => 'Không có trọng tài này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết trọng tài ",
          'data'=> new RefereeResource($referee)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, Referee $referee){
        $input = $request->all();
        $validator = Validator::make($input, [
           'ho_ten' => 'required', 'the_phat' => 'required','phat_den' => 'required','tong_so_tran'=>'required','vi_tri'=>'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $referee->ho_ten = $input['ho_ten'];
        $referee->the_phat = $input['the_phat'];
        $referee->vi_tri =$input['vi_tri'];
        $referee->phat_den = $input['phat_den'];
        $referee->tong_so_tran = $input['tong_so_tran'];
        $referee->save();
        $arr = [
           'status' => true,
           'message' => 'Trọng tài cập nhật thành công',
           'data' => new RefereeResource($referee)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(Referee $referee){
        $referee->delete();
        $arr = [
           'status' => true,
           'message' =>'Trọng tài đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}