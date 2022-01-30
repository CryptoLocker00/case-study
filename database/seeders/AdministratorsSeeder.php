<?php

namespace Database\Seeders;

use App\Models\Administrator;
use Illuminate\Database\Seeder;

class AdministratorsSeeder extends Seeder
{
    public function run()
    {
        $administrator = new Administrator();
        $administrator->name = 'Administrator';
        $administrator->email = 'racheal@test.com.my';
        $administrator->password = bcrypt('111111');
        $administrator->save();
    }
}
