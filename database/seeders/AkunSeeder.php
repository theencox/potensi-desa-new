<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = [
           [
           'name' => 'Admin Potensi Desa',
           'email' => 'admin@gmail.com',
           'level' => 'admin',
           'password' => bcrypt('12345678')
           ]
       ];
       foreach ($user as $key => $value) {
           User::create($value);
       }
    }
}
