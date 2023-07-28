<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Http\Resources\Card as CardResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class CardController extends Controller
{
   
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
    public function index() {
        $Card = Card::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách thẻ phạt",
        'data'=>CardResource::collection($Card)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
       'tran_dau_id' => 'required', 'cau_thu_id' => 'required','thoi_diem'=>'required','doi_bong_id'=>'required'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $Card = Card::create($input);
     $arr = ['status' => true,
        'message'=>"Thẻ phạt đã lưu thành công",
        'data'=> new CardResource($Card)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $Card = Card::find($id);
        if (is_null($Card)) {
           $arr = [
             'success' => false,
             'message' => 'Không có thẻ phạt này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết thẻ phạt ",
          'data'=> new CardResource($Card)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, Card $Card){
        $input = $request->all();
        $validator = Validator::make($input, [
           'tran_dau_id' => 'required', 'cau_thu_id' => 'required','thoi_diem' => 'required','doi_bong_id'=>'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $Card->tran_dau_id = $input['tran_dau_id'];
        $Card->cau_thu_id = $input['cau_thu_id'];
        $Card->thoi_diem = $input['thoi_diem'];
        $Card->doi_bong_id = $input['doi_bong_id'];
      
        $Card->save();
        $arr = [
           'status' => true,
           'message' => 'Thẻ phạt cập nhật thành công',
           'data' => new CardResource($Card)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(Card $Card){
        $Card->delete();
        $arr = [
           'status' => true,
           'message' =>'Thẻ phạt đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}