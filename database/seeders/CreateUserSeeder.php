<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' =>  'ketuart',
                'level' =>  '1',
                'password'  =>  bcrypt('12345')
            ],
            [
                'username' =>  'sekretaris',
                'level' =>  '2',
                'password'  =>  bcrypt('12345')
            ],
            [
                'username' =>  'bendahara',
                'level' =>  '3',
                'password'  =>  bcrypt('12345')
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}