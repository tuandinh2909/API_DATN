<?php

namespace App\Http\Controllers;

use App\Models\DoiBongTrongGiaiDau;
use App\Http\Resources\DoiBongTrongGiaiDau as DoiBongTrongGiaiDauResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DoiBongTrongGiaiDauController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
   public function index() {
        $DoiBongTrongGiaiDau = DoiBongTrongGiaiDau::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách giải đấu",
        'data'=>DoiBongTrongGiaiDauResource::collection($DoiBongTrongGiaiDau)
        ];
         return response()->json($arr, 200);
      }

      public function getByGiaiDauId(Request $request){
         $giaiDauId = $request->input('giai_dau_id');
         $arr = [
            'status' => true,
            'message' => "Danh sách giải đấu",
            'data'=>DoiBongTrongGiaiDau::where('giai_dau_id', $giaiDauId)->get()
         ];
         return response()->json($arr, 200);
      }

      public function yourMethod(Request $request)
      {
         $giaiDauId = $request->input('giai_dau_id');
         $doiBongIds = DoiBongTrongGiaiDau::getDoiBongIdsByGiaiDauId($giaiDauId);
         $response = [
         // 'status' => true,
         // 'message' => 'Danh sách giải đấu',
         'data' => $doiBongIds,
         ];

         return response()->json($response, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
      'giai_dau_id' => 'required', 'doi_bong_id' => 'required','bang_dau' => 'required','so_tran_thang' => 'required', 'so_tran_hoa' => 'required','so_tran_thua' => 'required','tong_ban_thang' => 'required', 'tong_ban_thua' => 'required','so_the_vang' => 'required'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $DoiBongTrongGiaiDau = DoiBongTrongGiaiDau::create($input);
     $arr = ['status' => true,
        'message'=>"Giải đấu đã lưu thành công",
        'data'=> new DoiBongTrongGiaiDauResource($DoiBongTrongGiaiDau)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $DoiBongTrongGiaiDau = DoiBongTrongGiaiDau::find($id);
        if (is_null($DoiBongTrongGiaiDau)) {
           $arr = [
             'success' => false,
             'message' => 'Không có giải đấu này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết giải đấu ",
          'data'=> new DoiBongTrongGiaiDauResource($DoiBongTrongGiaiDau)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, DoiBongTrongGiaiDau $DoiBongTrongGiaiDau){
        $input = $request->all();
        $validator = Validator::make($input, [
         'giai_dau_id' => 'required', 'doi_bong_id' => 'required','bang_dau' => 'required','so_tran_thang' => 'required', 'so_tran_hoa' => 'required','so_tran_thua' => 'required','tong_ban_thang' => 'required', 'tong_ban_thua' => 'required','so_the_vang' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $DoiBongTrongGiaiDau->giai_dau_id = $input['giai_dau_id'];
        $DoiBongTrongGiaiDau->doi_bong_id = $input['doi_bong_id'];
        $DoiBongTrongGiaiDau->bang_dau = $input['bang_dau'];
        $DoiBongTrongGiaiDau->so_tran_thang = $input['so_tran_thang'];
        $DoiBongTrongGiaiDau->so_tran_hoa = $input['so_tran_hoa'];
        $DoiBongTrongGiaiDau->so_tran_thua = $input['so_tran_thua'];
        $DoiBongTrongGiaiDau->tong_ban_thang = $input['tong_ban_thang'];
        $DoiBongTrongGiaiDau->tong_ban_thua = $input['tong_ban_thua'];
        $DoiBongTrongGiaiDau->so_the_vang = $input['so_the_vang'];
        $DoiBongTrongGiaiDau->so_the_do = $input['so_the_do'];
        $DoiBongTrongGiaiDau->save();
        $arr = [
           'status' => true,
           'message' => 'Danh sách cập nhật thành công',
           'data' => new DoiBongTrongGiaiDauResource($DoiBongTrongGiaiDau)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(DoiBongTrongGiaiDau $DoiBongTrongGiaiDau){
        $DoiBongTrongGiaiDau->delete();
        $arr = [
           'status' => true,
           'message' =>'Danh sách đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}
