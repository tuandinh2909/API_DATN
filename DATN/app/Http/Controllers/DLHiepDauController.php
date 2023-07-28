<?php

namespace App\Http\Controllers;

use App\Models\DLHiepDau;
use App\Http\Resources\DLHiepDau as DLHiepDauResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class DLHiepDauController extends Controller
{
   
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login']]);
  }
    public function index() {
        $DLHiepDau = DLHiepDau::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách hiệp đấu",
        'data'=>DLHiepDauResource::collection($DLHiepDau)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
       'loai_hiep_dau_id' => 'required', 'du_lieu_tran_dau_id' => 'required', 'tong_so_the' => 'required', 'so_the_vang' => 'required', 'so_the_do' => 'required', 'bu_gio' => 'required', 'ty_so' => 'required'
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $DLHiepDau = DLHiepDau::create($input);
     $arr = ['status' => true,
        'message'=>"DL hiệp đấu đã lưu thành công",
        'data'=> new DLHiepDauResource($DLHiepDau)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $DLHiepDau = DLHiepDau::find($id);
        if (is_null($DLHiepDau)) {
           $arr = [
             'success' => false,
             'message' => 'Không có dữ liệu này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết hiệp đấu ",
          'data'=> new DLHiepDauResource($DLHiepDau)
        ];
        return response()->json($arr, 201);
       }

    public function update(Request $request, DLHiepDau $DLHiepDau){
        $input = $request->all();
        $validator = Validator::make($input, [
            'loai_hiep_dau_id' => 'required', 'du_lieu_tran_dau_id' => 'required', 'tong_so_the' => 'required', 'so_the_vang' => 'required', 'so_the_do' => 'required', 'bu_gio' => 'required', 'ty_so' => 'required'
        ]);
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
        $DLHiepDau->loai_hiep_dau_id = $input['loai_hiep_dau_id'];
        $DLHiepDau->du_lieu_tran_dau_id = $input['du_lieu_tran_dau_id'];
        $DLHiepDau->tong_so_the = $input['tong_so_the'];
        $DLHiepDau->so_the_vang = $input['so_the_vang'];
        $DLHiepDau->so_the_do = $input['so_the_do'];
        $DLHiepDau->bu_gio = $input['bu_gio'];
        $DLHiepDau->ty_so = $input['ty_so'];

        $DLHiepDau->save();
        $arr = [
           'status' => true,
           'message' => 'Cập nhật thành công',
           'data' => new DLHiepDauResource($DLHiepDau)
        ];
        return response()->json($arr, 200);
      }

    public function destroy(DLHiepDau $DLHiepDau){
        $DLHiepDau->delete();
        $arr = [
           'status' => true,
           'message' =>'DLHiepDau đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}