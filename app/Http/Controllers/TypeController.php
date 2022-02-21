<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Repositories\TypeEloquentRepository;
use App\Repositories\interfaces\TypeRepositoryInterface;
use App\Repositories\CategoryEloquentRepository;
use App\Repositories\interfaces\CategoryRepositoryInterface;
use Carbon\Carbon;

class TypeController extends Controller
{
    protected $cateRepository;
    protected $typeRepository;

    public function __construct(CategoryRepositoryInterface $cateRepository,TypeRepositoryInterface $typeRepository){
        $this->category = $cateRepository;
        $this->type = $typeRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeList = $this->type->getAll();
        return view('admin.Type.index', compact('typeList'));
    }

    /**
     * Show the form for creating a new resource.
     *vc mac a
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $CategoryID = $this->category->getAll();
        return view('admin.Type.create',compact('CategoryID'));
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
            'typName' => 'unique:types|max:255',
            'slug_typ' => 'unique:types|max:255',
            'type_name' => 'required|max:255',
            'slugType' => 'required|max:255',
            'Active' => 'required',
            'CategoryID' => 'required',
        ],
        [
            'typName.unique' => 'Tên đã bị trùng vui lòng nhập tên khác',
            'slug_typ.unique' => 'Slug đã bị trùng vui lòng nhập slug khác',
            'type_name.required' => 'Vui lòng nhập tên thể loại', 
            'slugType.required' => 'Vui lòng nhập slug thể loại',
            'CategoryID.required' => 'Vui lòng chọn id danh mục',
            'Active.required' => 'Vui lòng chọn quyền đăng nhập',
        ]
    );
        $data['typName'] = $request->type_name;
        $data['slug_typ'] = $request->slugType;
        $data['Active'] = $request->Active;
        $data['category_id'] = $request->CategoryID;
        $data['created_at'] = Carbon::now();        
        $data['updated_at'] = Carbon::now();
        $this->type->create($data);
        $message = "Create Success";
        if($data == null){
            $message = "Create Failed";
        }

        return redirect()->route('type.index')->with('message', $message);
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
        $CategoryID = $this->category->getAll();
        $data  = $this->type->find($id)->first();
        return view('admin.Type.edit', compact('data','CategoryID'));
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
        $data  = $this->type->find($id)->first();
        $bool = array();
        $bool = $request->validate([
            'type_name' => 'required|max:255',
            'slugType' => 'required|max:255',
            'Active' => 'required',
            'CategoryID' => 'required',
        ],
        [
            'type_name.required' => 'Vui lòng nhập tên thể loại', 
            'slugType.required' => 'Vui lòng nhập slug thể loại',
            'CategoryID.required' => 'Vui lòng chọn id danh mục',
            'Active.required' => 'Vui lòng chọn quyền đăng nhập',
        ]
    );
        $bool['typName'] = $request->type_name;
        $bool['slug_typ'] = $request->slugType;
        $bool['Active'] = $request->Active;
        $bool['category_id'] = $request->CategoryID;     
        $bool['updated_at'] = Carbon::now();
        $bool = $data->update($bool);
        $message = "Update Success";
        if($bool == null){
            $message = "Update Failed";
        }

        return redirect()->route('type.index')->with('message', $message);
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
        if(!($this->type->delete($id))){
            $message = "Delete Failed";
        }

        return redirect()->route('type.index')->with('message', $message);
    }
}
