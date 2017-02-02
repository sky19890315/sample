<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $user = $users->first();
        $user_id = $user->id;

        /*获取取出掉id为1的所有用户id数组*/
        $followers = $users->slice(1);
        $follower_ids = $followers->pluck('id')->toArray();

        /*关注除了管理员1号以外的所有用户*/
        $user->follow($follower_ids);

        /*除了管理员其他人都来关注1号 管理员*/
        foreach ($followers as $follower)
        {
            $follower->follow($user_id);
        }


    }
}
