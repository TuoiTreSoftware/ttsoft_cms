<?php

namespace TTSoft\User\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use  TTSoft\Auth\Mail\ResetPasswordUserMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class Customer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const IS_ADMIN = 1;

    /**
     *
     * check user is admin 
     *
     */
    
    public function getIsAdminAttribute($value){
        return $value == self::IS_ADMIN ? true : false;
    }


    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'phone_number',
        'birth_date',
        'name', 
        'email', 
        'password',
        'avatar',
        'address',
        'is_admin',
    ];

    protected $guard = 'customers';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /* @return full name for user */

    public function getFullNameAttribute(){
        return $this->attributes['first_name'] . ' '. $this->attributes['last_name'];
    }


    public static function findByEmail($email){
        $data = self::where(['email' => $email])->first();
        if ($data) {
            return $data;
        }
        return null;
    }

    public function sendMailUserResetPassword($params)
    {
        if (env('QUEUE_DRIVER') == 'database') 
        {
            Mail::to($this->email)->queue(new ResetPasswordUserMail($params));
        }
        else
        {
            Mail::to($this->email)->send(new ResetPasswordUserMail($params));
        }
    }

    public function validationPasswordReset($data = array())
    {
        $password_resets = DB::table('password_customer_resets')->where($data);
        if ($password_resets->first()) 
        {
            $data = $password_resets->first();
            if (Carbon::parse($data->expire_at)->format('Y-m-d H:i:s') <= Carbon::now()) {
                return false;
            }
            $password_resets->delete();
            return true;
        }
        return false;
    }
    
}
