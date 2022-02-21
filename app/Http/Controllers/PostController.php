<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Repositories\TypeEloquentRepository;
use App\Repositories\interfaces\TypeRepositoryInterface;
use App\Repositories\PostEloquentRepository;
use App\Repositories\interfaces\PostRepositoryInterface;
use Carbon\Carbon;

class PostController extends Controller
{
    protected $postRepository;
    protected $typeRepository;

    public function __construct(PostRepositoryInterface $postRepository,TypeRepositoryInterface $typeRepository){
        $this->post = $postRepository;
        $this->type = $typeRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postList = $this->post->getAll();
        return view('admin.Post.index', compact('postList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeID = $this->type->getAll();
        return view('admin.Post.create', compact('typeID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typeID = $this->type->getAll();
        $data = array();
        $data = $request->validate([
            'title' => 'required|unique:posts',
            'slugpost' => 'required|max:255',
            'slug_post' => 'unique:posts|max:255',
            'content' => 'required|unique:posts',
            'images' => 'required',
            'summary' => 'required|unique:posts',
            'Active' => 'required',
            'featured'=> 'required',
            'luotxem'=> 'required',
            'hot'=> 'required',
            'popular'=> 'required',
            'trending'=> 'required',
            'typeID' => 'required',
        ],
        [
            'title.unique' => 'Title đã bị trùng vui lòng nhập title khác',
            'slug_post.unique' => 'Slug đã bị trùng vui lòng nhập slug khác',
            'content.unique' => 'Content đã bị trùng vui lòng nhập contentkhác',
            'summary.unique' => 'Summary đã bị trùng vui lòng nhập Summary khác',
            'title.required' => 'Vui lòng nhập Title', 
            'slugpost.required' => 'Vui lòng nhập Slug', 
            'content.required' => 'Vui lòng nhập Content', 
            'images.required' => 'Vui lòng chọn ảnh', 
            'summary.required' => 'Vui lòng nhập Summary',
            'typeID.required' => 'Vui lòng chọn id thể loại',
            'Active.required' => 'Vui lòng chọn mục active',
            'featured.required' => 'Vui lòng chọn mục featured',
            'luotxem.required' => 'Vui lòng thêm lượt xem',
            'hot.required' => 'Vui lòng chọn mục hot',
            'popular.required' => 'Vui lòng chọn mục popular',
            'trending.required' => 'Vui lòng chọn mục trending',
        ]
    );
        $data['title'] = $request->title;
        $data['slug_post'] = $request->slugpost;
        $data['content'] = $request->content;
        $data['images'] = $request->images;
        $data['summary'] = $request->summary;
        $data['type_id'] = $request->typeID;
        $data['active'] = $request->Active;
        $data['featured'] = $request->featured;
        $data['luotxem'] = $request->luotxem;
        $data['hot'] = $request->hot;
        $data['popular'] = $request->popular;
        $data['trending'] = $request->trending;
        $data['created_at'] = Carbon::now();        
        $data['updated_at'] = Carbon::now();
        $this->post->create($data);
        $message = "Create Success";
        if($data == null){
            $message = "Create Failed";
        }

        return redirect()->route('post.index')->with('message', $message);
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
        $typeID = $this->type->getAll();
        $data  = $this->post->find($id)->first();
        return view('admin.Post.edit', compact('data','typeID'));
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
        $data  = $this->post->find($id)->first();
        $bool = array();
        $bool = $request->validate([
            'title' => 'required',
            'slugpost' => 'required',
            'content' => 'required',
            'images' => 'required',
            'summary' => 'required',
            'Active' => 'required',
            'featured'=> 'required',
            'luotxem'=> 'required',
            'hot'=> 'required',
            'popular'=> 'required',
            'trending'=> 'required',
            'typeID' => 'required',
            
        ],
        [
            'title.required' => 'Vui lòng nhập Title', 
            'slugpost.required' => 'Vui lòng nhập Slug', 
            'content.required' => 'Vui lòng nhập Content', 
            'images.required' => 'Vui lòng chọn ảnh',
            'summary.required' => 'Vui lòng nhập Summary',
            'typeID.required' => 'Vui lòng chọn id thể loại',
            'Active.required' => 'Vui lòng chọn quyền đăng nhập',
            'featured.required' => 'Vui lòng chọn mục featured',
            'luotxem.required' => 'Vui lòng thêm lượt xem',
            'hot.required' => 'Vui lòng chọn mục hot',
            'popular.required' => 'Vui lòng chọn mục popular',
            'trending.required' => 'Vui lòng chọn mục trending',
        ]
    );
        $bool['title'] = $request->title;
        $bool['slug_post'] = $request->slugpost;
        $bool['content'] = $request->content;
        $bool['images'] = $request->images;
        $bool['summary'] = $request->summary;
        $bool['type_id'] = $request->typeID;
        $bool['active'] = $request->Active;  
        $bool['featured'] = $request->featured;
        $bool['luotxem'] = $request->luotxem;
        $bool['hot'] = $request->hot;
        $bool['popular'] = $request->popular;
        $bool['trending'] = $request->trending;      
        $bool['updated_at'] = Carbon::now();
        $bool = $data->update($bool);
        $message = "Update Success";
        if($bool == null){
            $message = "Update Failed";
        }

        return redirect()->route('post.index')->with('message', $message);
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
        if(!($this->post->delete($id))){
            $message = "Delete Failed";
        }

        return redirect()->route('post.index')->with('message', $message);
    }
}
