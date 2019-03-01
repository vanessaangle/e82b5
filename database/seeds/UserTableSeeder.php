<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(User::get()->count() < 1)
        {
            User::create([
                'nama' => 'Administrator',
                'alamat' => 'Jalan Puputan Renon No 86 Denpasar',
                'telepon' => '6285737939345',
                'tanggal_lahir' => '1994-04-10',
                'tempat_lahir' => 'Denpasar',
                'username' => 'oka',
                'password' => bcrypt('123456'),
                'status' => true,
                'role' => 'Admin'
            ]);
        }
    }
}
