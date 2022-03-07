<?php

namespace Database\Seeders;

use App\Models\ClonedWebsite;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        // DB::table('cloned_websites')->truncate();
        // \App\Models\User::factory(10)->create();
        // ClonedWebsite::factory(100)->create();
        User::factory()->createOne([
            'name' => 'SuperAdmin WMT',
            'email' => 'admin.wmt@gmail.com',
            'password' => Hash::make('webmaster'),
            'role' => UserRole::SuperAdmin,
        ]);
    }
}
