<?php

namespace TTSoft\Auth\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Auth\Repositories\Eloquent\EloquentUserRepository;
use Illuminate\Support\Facades\Auth as Authenticate;
use TTSoft\Auth\Http\Requests\ForgotRequest;
use TTSoft\Auth\Http\Requests\ResetRequest;
use TTSoft\Auth\Http\Requests\LoginRequest;
use TTSoft\Auth\Entities\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class AuthController extends Controller
{
	/**
	 *
	 * @return attribute for user
	 *
	 */
	protected $repository;

	public function __construct(EloquentUserRepository $repository){
		$this->repository = $repository;
	}


    public function index(Request $request){
        return view('auth::pages.login');
    }

    /**
     *
     * @param $request all
     * @return true/false
     *
     */
    
    public function postLogin(LoginRequest $request){
        $credentials = $request->only(['email','password']);
        if (Authenticate::guard()->attempt($credentials , $request->has('remember'))) {
            return redirect()->route("admin.dashboard.get.index");
        }else{
            flash_error(trans('Email or password does not match'));
            return redirect()->back()->withInput($request->all());
        }
    }

    public function logout(){
        Authenticate::guard()->logout();
        flash_info(trans('Please login to manager systems'));
        return redirect()->route("auth.login.get.index");
    }

    public function showLinkRequestForm()
    {
        return view('auth::pages.forgot');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function postForgot(Request $request){
        $this->validate($request , ['email' => 'required|email']);
        $user = User::findByEmail($request->email);
        if($user)
        {
            $data = ['token' => $request->_token,'email' => $request->email];
            $user->sendMailUserResetPassword($data);
            $password_resets = [
                'email'        => $request->email,
                'token'        => $request->_token,
                'created_at'   => Carbon::now(),
                'expire_at'    => Carbon::now()->addHours(1),
            ];
            DB::table('password_resets')->insert($password_resets);
            flash_info("Link reset đã được gửi đến email của bạn");
            return redirect()->back();
        }
        else
        {
            flash_error("Email không không tồn tại trong hệ thống");
            return redirect()->back()->withInput($request->all());
        }
    }
    
    /* Làm mới mật khẩu */
    public function showFormReset($email , $token){
        if (empty($email) || empty($token)) 
        {
            abort(404);
        }
        $info = ['email' => $email , 'token' => $token];
        return view('auth::pages.reset',compact('info'));
    }
    public function resetFormReset($email , $token ,ResetRequest $request){
        $params = $request->all();
        $info = ['email' => $email , 'token' => $token];
        $user = User::findByEmail($email);
        if ($user) {
            $password_resets = $user->validationPasswordReset($info);
            if ($password_resets) 
            {
                $user->password = bcrypt($params['password_confirm']);
                $user->save();
                flash_info("Cập nhật mật khẩu thành công");
                return redirect()->route('auth.login.get.index');
            }
            else
            {
                flash_error("Email này không nằm trong danh sách yêu cầu hoặc đã hết hạn");
                return redirect()->back();
            }
        }
       else
       {
            flash_error("Email không tồn tại trong hệ thống");
            return redirect()->back()->withInput($params);
       }
    }
}
