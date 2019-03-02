<?php

use Illuminate\Database\Seeder;
use App\Web;

class WebTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Web::get()->count() < 1)
        {
            Web::create([
                'gambar_depan' => 'banner.png',
                'tentang' => 'Hellow World',
                'telepon' => '6285737484961',
                'email' => 'puspem@badungkab.go.id',
                'alamat' => 'Jalan jalan dot com'
            ]);
        }
    }
}
