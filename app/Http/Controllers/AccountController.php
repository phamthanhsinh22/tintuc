<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\AccountEloquentRepository;
use App\Repositories\interfaces\AccountRepositoryInterface;
use Carbon\Carbon;


class AccountController extends Controller
{
    protected $accRepository;

    public function __construct(AccountRepositoryInterface $accRepository){
        $this->user = $accRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accList = $this->user->getAll();
        return view('admin.Account.index', compact('accList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        $data = $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
            'quyen' => 'required',
        ],
        [
            'name.unique' => 'Tên đã bị trùng vui lòng nhập tên khác',
            'email.unique' => 'Slug đã bị trùng vui lòng nhập slug khác',
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập pass',
            'quyen.required' => 'Vui lòng chọn quyền đăng nhập',
        ]
    );
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $data['quyen'] = $request->quyen;
        $data['email_verified_at'] = Carbon::now();
        $data['created_at'] = Carbon::now();        
        $data['updated_at'] = Carbon::now();
        $this->user->create($data);
        $message = "Create Success";
        if($data == null){
            $message = "Create Failed";
        }
        
        return redirect()->route('account.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data  = $this->user->find($id)->first();
        return view('admin.Account.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data  = $this->user->find($id)->first();
        $bool = array();
        $bool = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required',
            'quyen' => 'required',
        ],
        [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập pass',
            'quyen.required' => 'Vui lòng chọn quyền đăng nhập',
        ]
    );
        $bool['name'] = $request->name;
        $bool['email'] = $request->email;
        $bool['password'] = bcrypt($request->password);
        $bool['quyen'] = $request->quyen;      
        $bool['updated_at'] = Carbon::now();
        $bool['email_verified_at'] = Carbon::now();
        $bool = $data->update($bool);
        $message = "Update Success";
        if($bool == null){
            $message = "Update Failed";
        }

        return redirect()->route('account.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = "Delete Success";
        if(!($this->user->delete($id))){
            $message = "Delete Failed";
        }

        return redirect()->route('account.index')->with('message', $message);
    }
}