<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\AccountEloquentRepository;
use App\Repositories\interfaces\AccountRepositoryInterface;
use Carbon\Carbon;

class AdminController extends Controller
{
    protected $accRepository;

    public function __construct(AccountRepositoryInterface $accRepository){
        $this->user = $accRepository;
    }
    public function index(){
        if(!Auth::check())
            return redirect('login')->with('message','Bạn phải đăng nhập');
        else
            return view('admin.layout');
    }
    public function getLogin(){
        return view('login.login'); 
    }
    public function getlogout(){
    	Auth::logout();
    	return redirect()->back();
    }
    public function postlogin(Request $request){
        $arr = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            
        ],
        [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]
        );
    	$arr = [
            //'name' => $request ->name,
    		'email' => $request ->email,
    		'password'=>$request->password, 
    	];
    	if(Auth::attempt($arr)){
           // if(Auth::User("quyen")=='1')
            if(Auth::User()->quyen =='1')
                return redirect('admin');
            else if(Auth::User()->quyen =='0')
                return redirect('index');
    		   
    	}else
    	{
    		return redirect('login')->with('message','Nhập sai email hoặc mật khẩu');
    	}
    }
    public function getRegister(){
        return view('login.register'); 
    }
    public function postRegister(Request $request){
        $arr = $request->validate([
            'name' => 'required|unique:users|max:255', 
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|max:255',
            'password_confirmation' => 'required|same:password',
            'quyen' => 'required'
        ],
        [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'bạn đã nhập bị trùng',
            'name.unique' => 'bạn đã nhập bị trùng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password_confirmation.required' => 'Trường xác nhận mật khẩu là bắt buộc.',
        ]
        );
        $arr = [
            'name' => $request ->name,
    		'email' => $request ->email,
    		'password'=>bcrypt($request->password), 
            'quyen'=>$request->quyen, 
    	];
        $this->user->create($arr);
        return redirect()->route('login')->with('message','Đăng ký thành công');
    }
}