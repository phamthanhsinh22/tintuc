<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        //\App\Models\Category::factory(5)->create();
        //\App\Models\Type::factory(10)->create();
        \App\Models\Post::factory(20)->create();
        //DB::table('users')->insert([
                // ['id'=>20, 'name'=>'Sơn' ,'email'=>'son@nguyen','password'=>bcrypt(123456),'quyen'=>'1']
           // ]);
    }
}
