<x-login-layout>



    @if($followsList->isEmpty())
    <h4>フォローリスト</h4> 
    <p>フォローしているユーザーはいません。</p>
    @else
    <div class="list_icon">
        <h4>フォローリスト</h4> 
        @foreach ($followsList as $following)
        <a href="{{ route('otherprofile', ['id' => $following->id]) }}">
                <img src="{{ asset('storage/icons/'.$following->icon_image) }}" alt="アイコン" width="50" height="50" class="icon">
         </a>
        @endforeach
    </div>
    <hr  style="border: 4px solid #E0E0E0 ;">
    @endif

    @if(isset( $posts ))
    @foreach ($posts as $post)
        <div class="fouserspost">
        <!-- 結合演算子 （けつごうえんざんし）　変数と文字列をつなげたいときに持ってくるやり方　変数のものをイメージと繋げる-->
        <img src="{{ asset('storage/icons/' . $post-> user -> icon_image) }}" alt="アイコン"width="50" height="50" class="icon">
        <div class="seconduserspost">
        <span>{{ $post-> user -> username }}</span>
        <p>投稿内容：{{ $post->post }}</p>
        </div>
       </div>
        <p class="followpost-time"><small>{{ $post->created_at->format('Y-m-d H:i:s') }}</small></p>
        <hr  style="border: solid #E0E0E0 ;">
        @endforeach

    
    @else
        <p>投稿はありません。</p>
    @endif

</x-login-layout>
    
      <!--endif がここまでですよという意味　 foreachの後には endforeach　elseifがそうじゃなければ -->
    

    <!-- どうしても変数を使いたいというときは、コンパクト関数にいれたものを使う　followsList　asの左側に入れたものはコンパクト関数と一致していないといけない 
    $followsList as $followingは followsListを-followingっていう一人筒確認していく作業　複数形as単数->