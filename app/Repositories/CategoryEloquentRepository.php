<?php



namespace App\Repositories;
use App\Repositories\EloquentRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use DB;
use Illuminate\Http\Request;
use App\Category;

class CategoryEloquentRepository extends EloquentRepository implements CategoryRepositoryInterface
{
/**
* get model
* @return string
*/
public function getModel()
	{
		return \App\Models\Category::class;
	}
}
