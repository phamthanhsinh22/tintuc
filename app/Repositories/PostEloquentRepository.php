<?php



namespace App\Repositories;
use App\Repositories\EloquentRepository;
use App\Repositories\Interfaces\PostRepositoryInterface;
use DB;
use Illuminate\Http\Request;
use App\Post;

class PostEloquentRepository extends EloquentRepository implements PostRepositoryInterface
{
/**
* get model
* @return string
*/
public function getModel()
	{
		return \App\Models\Post::class;
	}
	public function search(Request $request){
		$keyword = $request->keyword_submit;
		$search = DB::table('posts')	
        ->join('types','type_id','=','types.id')
        ->join('categories','category_id','=','categories.id')
        ->where('title','like','%'.$keyword.'%')
        ->orWhere('typName','like','%'.$keyword.'%')->orWhere('catName','like','%'.$keyword.'%')->get();
		return $search;
	}

}
