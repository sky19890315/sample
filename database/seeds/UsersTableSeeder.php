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
        
                $user = User::find(1);
                $user->name = 'sky';
                $user->email = 'sunkeyi2017@gmail.com';
                $user->password ='123456';
                $user->is_admin = true;
                $user->activated = true;
                $user->save();

   

    }
}
