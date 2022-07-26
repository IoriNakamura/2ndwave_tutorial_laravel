<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = collect([
            [
                'name'     => 'エミリア・クラーク',
                'email'    => 'emilia@2ndwave.jp',
                'password' => Hash::make('emilia'),
            ],
            [
                'name'     => 'モーガン・フリーマン',
                'email'    => 'morgan@2ndwave.jp',
                'password' => Hash::make('morgan'),
            ],
            [
                'name'     => 'ジム・キャリー',
                'email'    => 'jim@2ndwave.jp',
                'password' => Hash::make('jim'),
            ],
            [
                'name'     => 'ジョニー・デップ',
                'email'    => 'johnny@2ndwave.jp',
                'password' => Hash::make('johnny'),
            ],
            [
                'name'     => 'ジェイソン・ステイサム',
                'email'    => 'jason@2ndwave.jp',
                'password' => Hash::make('jason'),
            ],
            [
                'name'     => 'ウィル・スミス',
                'email'    => 'will@2ndwave.jp',
                'password' => Hash::make('will'),
            ],
            [
                'name'     => 'トム・クルーズ',
                'email'    => 'tom@2ndwave.jp',
                'password' => Hash::make('tom'),
            ],
            [
                'name'     => 'レオナルド・ディカプリオ',
                'email'    => 'leo@2ndwave.jp',
                'password' => Hash::make('leo'),
            ],
            [
                'name'     => 'キアヌ・リーブス',
                'email'    => 'keanu@2ndwave.jp',
                'password' => Hash::make('keanu'),
            ],
            [
                'name'     => 'ブラッド・ピット',
                'email'    => 'brad@2ndwave.jp',
                'password' => Hash::make(''),
            ],
        ]);

        foreach($users as $user) {
            User::create($user);
        }
    }
}