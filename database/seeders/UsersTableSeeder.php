<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//そのファイル内で「 DB::」 という記法を使えるようにするために追加
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username' => 'UserName',
            'email' => 'User@mailaddress.com',
            'password' => bcrypt('password'),
        ]);
    }
}
