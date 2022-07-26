<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = collect([
            [
                'title'           => 'ゲームオブスローンズ',
                'content'         => '『ゲーム・オブ・スローンズ』（原題：Game of Thrones、略称GOT[2]）は、ジョージ・R・R・マーティン著のファンタジー小説シリーズ『氷と炎の歌』を原作としたHBOのテレビドラマシリーズ。',
            ],
            [
                'title'           => 'ショーシャンクの空に',
                'content'         => '『ショーシャンクの空に』（ショーシャンクのそらに、原題：The Shawshank Redemption[注釈 1]）は、1994年に公開されたアメリカ映画。刑務所内の人間関係を通して、冤罪によって投獄された有能な銀行員が、腐敗した刑務所の中でも希望を捨てず生き抜いていくヒューマン・ドラマ',
            ],
            [
                'title'           => 'イエスマン',
                'content'         => '『イエスマン “YES”は人生のパスワード』（Yes Man）は、2008年にアメリカとイギリスで製作されたコメディ映画である。',
            ],
            [
                'title'           => 'ロード・オブ・ザ・リング',
                'content'         => '「ロード・オブ・ザ・リング」（The Lord of the Rings）は、J・R・R・トールキンの小説『指輪物語』を原作とし、ピーター・ジャクソンが監督・共同脚本を務めた叙事詩的[1][2]ファンタジー冒険映画三部作である。',
            ],
            [
                'title'           => 'レッドドラゴン',
                'content'         => '『レッド・ドラゴン』（Red Dragon）は、2002年のアメリカ映画。トマス・ハリスの小説『レッド・ドラゴン』の2度目の映画化である。ハンニバル・レクター博士シリーズ4部作のうちの3作目。アカデミー賞受賞作品となった『羊たちの沈黙』で登場するFBI捜査官クラリス・スターリングに出会う直前までを映像化している。',
            ],
        ]);

        $user_ids = collect([
            26,27,28,29,30,31,32,33,34,35
        ]);

        foreach(range(1, 100) as $idx) {
            $blog    = $blogs->random();
            $user_id = $user_ids->random();
            Blog::create([
                'title'           => $blog['title'],
                'content'         => $blog['content'],
                'created_user_id' => $user_id,
            ]);
        }
        
    }
}
