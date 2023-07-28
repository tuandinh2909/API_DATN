<?php
namespace App\Models;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Login as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TaiKhoan extends Model implements JWTSubject{
   use HasFactory, HasApiTokens,Notifiable;
   protected $fillable = ['id','matkhau','email','hoten','sdt','loai_tai_khoan','lop','avatar','trang_thai'];
   protected $casts = [
      'email_verified_at' => 'datetime',
  ];
  public function getJWTIdentifier()
  {
      return $this->getKey();
  }

/**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
  public function getJWTCustomClaims()
  {
      return [];
  }

   
}