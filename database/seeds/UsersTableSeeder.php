<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(50)->make();
        User::insert($users->toArray());

<<<<<<< HEAD

                $user = User::find(1);
                $user->name = 'sky';
                $user->email = 'sunkeyi2017@gmail.com';
                $user->password ='123456';
                $user->is_admin = true;
                $user->activated = true;
             $user->save();
=======
   
>>>>>>> e753bde22818773b741bb07d4af6fd8b47c4e495
    }
}
