<x-login-layout>



    @if($followsList->isEmpty())
    <h4>フォローリスト</h4> 
    <p>フォローしているユーザーはいません。</p>
    @else
    <div class="list_icon">
        <h4>フォローリスト</h4> 
        @foreach ($followsList as $following)
        <img src="{{ asset('storage/icons/'.$following->icon_image) }}" alt="アイコン" width="50" height="50" class="icon">
            <a href="{{ route('otherprofile', ['id' => $following->id]) }}">
                <span>{{ $following->username }}</span>
            </a>
        @endforeach
    </div>
    <hr  style="border: 4px solid #E0E0E0 ;">
    @endif

    @if(isset( $posts ))
    @foreach ($posts as $post)
        <div class="userspost">
        <!-- 結合演算子 （けつごうえんざんし）　変数と文字列をつなげたいときに持ってくるやり方　変数のものをイメージと繋げる-->
        <img src="{{ asset('storage/icons/' . $post-> user -> icon_image) }}" alt="アイコン"width="50" height="50" class="icon">
        <p>投稿内容：{{ $post->post }}</p></div>
        <hr  style="border: solid #E0E0E0 ;">
        @endforeach

    
    @else
        <p>投稿はありません。</p>
    @endif

</x-login-layout>
    
      <!--endif がここまでですよという意味　 foreachの後には endforeach　elseifがそうじゃなければ -->
    

    <!-- どうしても変数を使いたいというときは、コンパクト関数にいれたものを使う　followsList　asの左側に入れたものはコンパクト関数と一致していないといけない 
    $followsList as $followingは followsListを-followingっていう一人筒確認していく作業　複数形as単数->