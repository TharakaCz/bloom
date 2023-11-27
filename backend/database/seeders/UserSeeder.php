<?php

namespace Database\Seeders;

use App\Models\User;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $user = new User();
            $user->uuid = Uuid::uuid4();
            $user->first_name = fake()->name;
            $user->last_name = fake()->name;
            $user->email = fake()->email;
            $user->phone = fake()->phoneNumber;
            $user->avatar = Gravatar::get($user->email, ['size'=>500]);
            $user->avatar_type = User::$gravatar;
            $user->password = Hash::make('123@User');
            $user->role_id = 1;
            $user->address_1 = fake()->address;
            $user->token = sha1(time().$user->uuid.$user->role_id.$user->email);
            $user->save();

            $admin = new User();
            $admin->uuid = Uuid::uuid4();
            $admin->first_name = fake()->name;
            $admin->last_name = fake()->name;
            $admin->email = fake()->email;
            $admin->phone = fake()->phoneNumber;
            $admin->avatar = Gravatar::get($user->email, ['size'=>500]);
            $admin->avatar_type = User::$gravatar;
            $admin->password = Hash::make('123@Admin');
            $admin->role_id = 2;
            $admin->address_1 = fake()->address;
            $admin->token = sha1(time().$admin->uuid.$admin->role_id.$admin->email);
            $admin->save();

            $super_admin = new User();
            $super_admin->uuid = Uuid::uuid4();
            $super_admin->first_name = fake()->name;
            $super_admin->last_name = fake()->name;
            $super_admin->email = fake()->email;
            $super_admin->phone = fake()->phoneNumber;
            $super_admin->avatar = Gravatar::get($user->email, ['size'=>500]);
            $super_admin->avatar_type = User::$gravatar;
            $super_admin->password = Hash::make('123@SuperAdMiN');
            $super_admin->role_id = 3;
            $super_admin->address_1 = fake()->address;
            $super_admin->token = sha1(time().$super_admin->uuid.$super_admin->role_id.$super_admin->email);
            $super_admin->save();

        }catch (\Exception $ex){
            Log::error($ex->getMessage());
        }
    }
}
