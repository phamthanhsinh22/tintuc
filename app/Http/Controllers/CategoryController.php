<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Repositories\CategoryEloquentRepository;
use App\Repositories\interfaces\CategoryRepositoryInterface;
use Carbon\Carbon;

class CategoryController extends Controller
{
    protected $cateRepository;

    public function __construct(CategoryRepositoryInterface $cateRepository){
        $this->category = $cateRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catList = $this->category->getAll();
        return view('admin.Category.index', compact('catList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Category.create');
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
            'catName' => 'unique:categories|max:255',
            'slug_cate' => 'unique:categories|max:255',
            'category_name' => 'required|max:255',
            'slugCat' => 'required|max:255',
            'Active' => 'required',
        ],
        [
            'catName.unique' => 'Tên đã bị trùng vui lòng nhập tên khác',
            'slug_cate.unique' => 'Slug đã bị trùng vui lòng nhập slug khác',
            'category_name.required' => 'Vui lòng nhập tên danh mục', 
            'slugCat.required' => 'Vui lòng nhập slug danh mục',
            'Active.required' => 'Vui lòng chọn quyền đăng nhập',
        ]
    );
        $data['catName'] = $request->category_name;
        $data['slug_cate'] = $request->slugCat;
        $data['Active'] = $request->Active;
        $data['created_at'] = Carbon::now();        
        $data['updated_at'] = Carbon::now();
        $this->category->create($data);
        $message = "Create Success";
        if($data == null){
            $message = "Create Failed";
        }

        return redirect()->route('category.index')->with('message', $message);
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
        $data  = $this->category->find($id)->first();
        return view('admin.Category.edit', compact('data'));
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
        $data  = $this->category->find($id)->first();
        $bool = array();
        $bool = $request->validate([
            'category_name' => 'required|max:255',
            'slugCat' => 'required|max:255',
            'Active' => 'required',
        ],
        [
            'category_name.required' => 'Vui lòng nhập tên danh mục',
            'slugCat.required' => 'Vui lòng nhập slud danh muc',
            'Active.required' => 'Vui lòng chọn quyền đăng nhập',
        ]
    );
        $bool['catName'] = $request->category_name;
        $bool['slug_cate'] = $request->slugCat;
        $bool['Active'] = $request->Active;
        $data['updated_at'] = Carbon::now();
        $bool = $data->update($bool);
        $message = "Update Success";
        if($bool == null){
            $message = "Update Failed";
        }

        return redirect()->route('category.index')->with('message', $message);
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
        if(!($this->category->delete($id))){
            $message = "Delete Failed";
        }

        return redirect()->route('category.index')->with('message', $message);
    }
}
