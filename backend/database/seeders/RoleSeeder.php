<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "id" => 1,
                "role" => "user"
            ],
            [
                "id" => 2,
                "role" => "admin"
            ],
            [
                "id" => 3,
                "role" => "super_admin"
            ],
        ];

        try {
            foreach ($data as $key => $role){
                $model = new Roles();
                $model->id = $role['id'];
                $model->role = $role['role'];
                $model->save();
            }
        }catch (\Exception $ex){
            Log::error($ex->getMessage());
        }
    }
}
