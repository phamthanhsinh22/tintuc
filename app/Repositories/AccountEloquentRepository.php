<?php



namespace App\Repositories;
use App\Repositories\EloquentRepository;
use App\Repositories\Interfaces\AccountRepositoryInterface;
use DB;
use Illuminate\Http\Request;
use App\User;

class AccountEloquentRepository extends EloquentRepository implements AccountRepositoryInterface
{
/**
* get model
* @return string
*/
public function getModel()
	{
		return \App\Models\User::class;
	}
}
