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
        $users = factory(User::class)->times(200)->make();
        User::insert($users->toArray());

        $user = User::find(1);
        $user->name = "sky";
        $user->email = "sunkeyi2017@gmail.com";
        $user->password = bcrypt('password');
        $user->save();


    }
}
