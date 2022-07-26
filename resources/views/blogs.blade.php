@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>ブログ一覧</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="w-auto">タイトル</th>
                        <th scope="col" class="w-50">内容</th>
                        <th scope="col" class="w-auto">作成者</th>
                        <th scope="col" class="w-auto">作成日</th>
                        <th scope="col" class="w-auto">更新日</th>
                        <th scope="col" class="w-10">ボタン</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>ゲームオブスローンズ</td>
                        <td>『ゲーム・オブ・スローンズ』（原題：Game of Thrones、略称GOT[2]）は、ジョージ・R・R・マーティン著のファンタジー小説シリーズ『氷と炎の歌』を原作としたHBOのテレビドラマシリーズ。</td>
                        <td>鈴木一郎</td>
                        <td>2022-5-30 12:00:00</td>
                        <td>2022-5-30 13:00:00</td>
                        <td>   
                            <a href="/blogs/1">
                                <button type="button" class="btn btn-primary">詳細</button>
                            </a>
                        <td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>ショーシャンクの空に</td>
                        <td>『ショーシャンクの空に』（ショーシャンクのそらに、原題：The Shawshank Redemption[注釈 1]）は、1994年に公開されたアメリカ映画。刑務所内の人間関係を通して、冤罪によって投獄された有能な銀行員が、腐敗した刑務所の中でも希望を捨てず生き抜いていくヒューマン・ドラマ</td>
                        <td>山田太郎</td>
                        <td>2022-5-30 12:00:00</td>
                        <td>2022-5-30 13:00:00</td>
                        <td>   
                            <a href="/blogs/2">
                                <button type="button" class="btn btn-primary">詳細</button>
                            </a>
                        <td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>イエスマン</td>
                        <td>『イエスマン “YES”は人生のパスワード』（Yes Man）は、2008年にアメリカとイギリスで製作されたコメディ映画である。</td>
                        <td>鈴木一郎</td>
                        <td>2022-5-30 12:00:00</td>
                        <td>2022-5-30 13:00:00</td>
                        <td>   
                            <a href="/blogs/3">
                                <button type="button" class="btn btn-primary">詳細</button>
                            </a>
                        <td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>ロード・オブ・ザ・リング</td>
                        <td>「ロード・オブ・ザ・リング」（The Lord of the Rings）は、J・R・R・トールキンの小説『指輪物語』を原作とし、ピーター・ジャクソンが監督・共同脚本を務めた叙事詩的[1][2]ファンタジー冒険映画三部作である。</td>
                        <td>鈴木一郎</td>
                        <td>2022-5-30 12:00:00</td>
                        <td>2022-5-30 13:00:00</td>
                        <td>   
                            <a href="/blogs/4">
                                <button type="button" class="btn btn-primary">詳細</button>
                            </a>
                        <td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>レッドドラゴン</td>
                        <td>『レッド・ドラゴン』（Red Dragon）は、2002年のアメリカ映画。トマス・ハリスの小説『レッド・ドラゴン』の2度目の映画化である。ハンニバル・レクター博士シリーズ4部作のうちの3作目。アカデミー賞受賞作品となった『羊たちの沈黙』で登場するFBI捜査官クラリス・スターリングに出会う直前までを映像化している。</td>
                        <td>山田太郎</td>
                        <td>2022-5-30 12:00:00</td>
                        <td>2022-5-30 13:00:00</td>
                        <td>   
                            <a href="/blogs/5">
                                <button type="button" class="btn btn-primary">詳細</button>
                            </a>
                        <td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection