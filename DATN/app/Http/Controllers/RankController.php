<?php

namespace App\Http\Controllers;
use App\Models\Rank;
use Illuminate\Http\Request;
use App\Http\Resources\Rank as RankResource;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class RankController extends Controller
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
        $Rank = Rank::all();
        $arr = [
        'status' => true,
        'message' => "Bảng xếp hạng",
        'data'=>RankResource::collection($Rank)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
    'rank' => 'required','ten_doi_bong' => 'required','logo' => 'required','tong_diem' => 'required','thang','thua','hoa','tong_so_tran'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $Rank = Rank::create($input);
     $arr = ['status' => true,
        'message'=>"Hình thức đã lưu thành công",
        'data'=> new RankResource($Rank)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $Rank = Rank::find($id);
        if (is_null($Rank)) {
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
          'data'=> new RankResource($Rank)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, Rank $Rank){
        $input = $request->all();
        $validator = Validator::make($input, [
            'rank' => 'required','ten_doi_bong' => 'required','logo' => 'required','tong_diem' => 'required','thang','thua','hoa','tong_so_tran'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $Rank->id = $input['rank'];
        $Rank->ten_doi_bong = $input['ten_doi_bong'];
        $Rank->noi_dung = $input['logo'];
        $Rank->so_tran_toi_thieu = $input['tong_diem'];
        $Rank->thang = $input['thang'];
        $Rank->thua = $input['thua'];
        $Rank->hoa = $input['hoa'];
        $Rank->tong_so_tran = $input['tong_so_tran'];
        $Rank->save();
        $arr = [
           'status' => true,
           'message' => 'Hình thức cập nhật thành công',
           'data' => new RankResource($Rank)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(Rank $Rank){
        $Rank->delete();
        $arr = [
           'status' => true,
           'message' =>'Hình thức đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}
