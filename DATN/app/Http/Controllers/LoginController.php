<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Http\Resources\Login as LoginResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class LoginController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
    public function payload()
    {
        return auth()->payload();
    }

    public function index() {
        $login = Login::all();
        $arr = [
        'status' => true,
        'message' => "Danh sách tài khoản",
        'data'=>LoginResource::collection($login)
        ];
         return response()->json($arr, 200);
      }

    public function store(Request $request) {
     $input = $request->all(); 
     $validator = Validator::make($input, [
       'matkhau' => 'required','email'=>'required|email',
     ]);
     if($validator->fails()){
        $arr = [
          'success' => false,
          'message' => 'Lỗi kiểm tra dữ liệu',
          'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
     }
     $login = Login::create($input);
     $arr = ['status' => true,
        'message'=>"Tài khoản đã lưu thành công",
        'data'=> new LoginResource($login)
     ];
     return response()->json($arr, 201);
    }

    public function show($id) {
        $login = Login::find($id);
        if (is_null($login)) {
           $arr = [
             'success' => false,
             'message' => 'Không có tài khoản này',
             'data' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết tài khoản ",
          'data'=> new LoginResource($login)
        ];
        return response()->json($arr, 201);
       }

       public function update(Request $request, $id){
        $input = $request->all();
        $validator = Validator::make($input, [
          'matkhau' => 'required',
          'email' => 'required'
        ]);
    
        if($validator->fails()){
           $arr = [
             'success' => false,
             'message' => 'Lỗi kiểm tra dữ liệu',
             'data' => $validator->errors()
           ];
           return response()->json($arr, 200);
        }
    
        $login = Login::find($id);  
        if (is_null($login)) {
           $arr = [
             'success' => false,
             'message' => 'Không có tài khoản này',
             'data' => []
           ];
           return response()->json($arr, 200);
        }
    
        $login->matkhau = $input['matkhau'];
        $login->loai_tai_khoan = $input['loai_tai_khoan'];
        $login->email = $input['email'];
        $login->hoten = $input['hoten'];
        $login->sdt = $input['sdt'];
        $login->lop = $input['lop'];
        $login->avatar = $input['avatar'];
        $login->trang_thai = $input['trang_thai'];
        $login->save();
    
        $arr = [
           'status' => true,
           'message' => 'Tài khoản cập nhật thành công',
           'data' => new LoginResource($login)
        ];
        return response()->json($arr, 200);
    }
    

    public function destroy(Login $login){
        $login->delete();
        $arr = [
           'status' => true,
           'message' =>'Tài khoản đã được xóa',
           'data' => [],
        ];
        return response()->json($arr, 200);
     }
}