<?php

namespace Database\Seeders;

use App\Models\Permissions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = ['create', 'view', 'update'];
        $admin = ['create', 'view', 'update', 'registration'];
        $super_admin = ['create', 'view', 'update', 'registration', 'delete', 'hold'];

        try {
            foreach ($user as $key => $permission){
                $model = new Permissions();
                $model->role_id = 1;
                $model->permission = $permission;
                $model->save();
            }

            foreach ($admin as $key => $permission){
                $model = new Permissions();
                $model->role_id = 2;
                $model->permission = $permission;
                $model->save();
            }

            foreach ($super_admin as $key => $permission){
                $model = new Permissions();
                $model->role_id = 3;
                $model->permission = $permission;
                $model->save();
            }
        }catch (\Exception $ex){
            Log::error($ex->getMessage());
        }

    }
}
