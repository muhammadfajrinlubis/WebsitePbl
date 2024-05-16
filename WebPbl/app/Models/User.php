<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;





use Illuminate\Support\Facades\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function getSingle($id){
        return self::find($id);
    }

    static public function  getAdmin(){
        $return = self::select('users.*')
                        ->where('user_type','=',1)
                        ->where('is_delete','=',0);
                        if(!empty(Request::get('name')))
                        {
                            $return = $return->where('name','like','%'.request::get('name'). '%');
                        }
                        if(!empty(Request::get('email')))
                        {
                            $return = $return->where('email','like','%'.Request::get('email'). '%');
                        }
                        if(!empty(Request::get('date')))
                        {
                            $return = $return->where('date','like','%'.Request::get('date'). '%');
                        }
            $return= $return ->orderBy('id','desc')
                        ->paginate(10);

        return $return;
    }

    static public function  getAnak(){
        $return = self::select('users.*')
                        ->where('users.user_type','=',2)
                        ->where('users.is_delete','=',0);
            $return= $return ->orderBy('users.id','desc')
                        ->paginate(10);

        return $return;
    }


    static public function getEmailSingle($email){
        return User::where('email', '=', $email)->first();
    }

    static public function getTokenSingle($remember_token){
        return User::where('remember_token', '=', $remember_token)->first();
    }

    public function getProfile() {
        if (!empty($this->profile) && file_exists(public_path('profiles') . '/' . $this->profile)) {
            return url('profiles/' . $this->profile); // Fixed concatenation and syntax
        } else {
            return url(""); // Return empty URL if profile is not found
        }
    }
}
