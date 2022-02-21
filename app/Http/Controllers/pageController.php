<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Type;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Repositories\CategoryEloquentRepository;
use App\Repositories\interfaces\CategoryRepositoryInterface;
use App\Repositories\PostEloquentRepository;
use App\Repositories\interfaces\PostRepositoryInterface ;
use App\Repositories\TypeEloquentRepository;
use App\Repositories\interfaces\TypeRepositoryInterface ;
use Session;
class pageController extends Controller
{
    protected $cateRepository;
    protected $typeRepository;
    protected $postRepository;

    public function __construct(CategoryRepositoryInterface $cateRepository, TypeRepositoryInterface $typeRepository ,PostRepositoryInterface $postRepository){
        $this->category = $cateRepository;
        $this->type = $typeRepository;
        $this->post = $postRepository;
    }
    public function getIndex(){
        $cate = $this->category->getAll();
        $type = $this->type->getAll();
        $typeID = Type::where('active',1)->orderBy('id','ASC')->limit(5)->get();
        $post = $this->post->getAll();
        $postNew = Post::where('active',1)->orderBy('updated_at','DESC')->limit(5)->get();
        return view('layout.index', compact('cate','type','post','postNew','typeID'));
    }
    public function type($slug){
        $cate = $this->category->getAll();
        $category = Category::where('Active',1)->get();       
        $type = $this->type->getAll();
        $type_id = Type::where('slug_typ', $slug)->first();
        $post = Post::where('active',1)->where('type_id',$type_id->id)->get();
        $posthot = $this->post->getAll();
        $type1 = $type_id->typName;
        $typeID = Type::where('active',1)->orderBy('id','ASC')->limit(5)->get();
        return view('layout.type', compact('category','type','post','type_id','cate','type1','typeID','posthot'));
   }
    public function post($slug){
        $cate = $this->category->getAll();      
        $type = Type::get();
        $typeID = Type::where('active',1)->orderBy('id','ASC')->limit(5)->get();
        $post = Post::with('type')->where('slug_post', $slug)->where('active',1)->first();
        $posthot = $this->post->getAll();
        $cmt = Comment::where('post_id',$post->id)->orderBy('created_at','DESC')->limit(5)->get();
        
        return view('layout.post', compact('cate','type','post','cmt','typeID','posthot'));
}
    public function featured(){
        $cate = $this->category->getAll();
        $type = $this->type->getAll();
        $post = $this->post->getAll();
        $typeID = Type::where('active',1)->orderBy('id','ASC')->limit(5)->get();
        return view('layout.featured',compact('cate','type','post','typeID'));
    }
    public function hot(){
        $cate = $this->category->getAll();
        $type = $this->type->getAll();
        $post = $this->post->getAll();
        $typeID = Type::where('active',1)->orderBy('id','ASC')->limit(5)->get();
        return view('layout.hot',compact('cate','type','post','typeID'));
    }
    public function popular(){
        $cate = $this->category->getAll();
        $type = $this->type->getAll();
        $post = $this->post->getAll();
        $typeID = Type::where('active',1)->orderBy('id','ASC')->limit(5)->get();
        return view('layout.popular',compact('cate','type','post','typeID'));
    }
    public function trending(){
        $cate = $this->category->getAll();
        $type = $this->type->getAll();
        $post = $this->post->getAll();
        $typeID = Type::where('active',1)->orderBy('id','ASC')->limit(5)->get();
        return view('layout.trending',compact('cate','type','post','typeID'));
    }
    public function watched(){
        $cate = $this->category->getAll();
        $type = $this->type->getAll();
        $post = Post::where('active',1)->orderBy('luotxem', 'DESC')->limit(7)->get();
        $typeID = Type::where('active',1)->orderBy('id','ASC')->limit(5)->get();
        return view('layout.watched',compact('cate','type','post','typeID'));
    }
    public function getSearch(Request $request){
        $cate = $this->category->getAll();
        $category = Category::where('Active',1)->get();       
        $type = $this->type->getAll();
        $post = $this->post->getAll();
        $typeID = Type::where('active',1)->orderBy('id','ASC')->limit(5)->get();
        $search_post = $this->post->search($request);
        return view('layout.seach', compact('category','type','cate','post','typeID','search_post'));
    }
    public function comment(Request $request){
        $data = array();
        $data['content'] = $request->content;
        $data['name'] = $request->name;
        $data['user_id'] = $request->userID;
        $data['post_id'] = $request->postID;
        $data['created_at'] = Carbon::now();        
        $data['updated_at'] = Carbon::now();
        DB::table('comments')->insert($data);
        return redirect()->back();
    }
    public function letter(Request $request){
        $data = array();
        $data['content'] = $request->content;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['created_at'] = Carbon::now();        
        $data['updated_at'] = Carbon::now();
        DB::table('letters')->insert($data);
        return redirect()->back()->with('message', 'Gửi thành công');
    }
}