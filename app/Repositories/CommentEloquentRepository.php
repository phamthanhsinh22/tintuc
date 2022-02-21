<?php



namespace App\Repositories;
use App\Repositories\EloquentRepository;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use DB;
use Illuminate\Http\Request;
use App\Comment;

class CommentEloquentRepository extends EloquentRepository implements CommentRepositoryInterface
{
/**
* get model
* @return string
*/
public function getModel()
	{
		return \App\Models\Comment::class;
	}
}
