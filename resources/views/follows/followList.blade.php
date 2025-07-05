<x-login-layout>


  <h2>機能を実装していきましょう。</h2>

    @if($followsList->isEmpty())
    <p>フォローしているユーザーはいません。</p>
    @else
    <ul>
        @foreach ($followsList as $following)
            <img src="{{ asset('storage/icons/'.$following->icon_image) }}" alt="アイコン" width="50" height="50">
            <span>{{ $following->username }}</span>
            </li>

            @endforeach
    <ul>
    @endif 
    
    @if(isset( $posts ))
    @foreach ($posts as $post)
        <div>
        <li><img src="{{ asset('images/' . $following->icon_image) }}" alt="アイコン">
            <p>名前：{{ $post->user->username }}</p>
            <p>投稿内容：{{ $post->post }}</p>
        </div>
    @endforeach
    
    @else
        <p>投稿はありません。</p>
    @endif
</x-login-layout>
    
      <!--endif がここまでですよという意味　 foreachの後には endforeach　elseifがそうじゃなければ -->
    

    <!-- どうしても変数を使いたいというときは、コンパクト関数にいれたものを使う　followsList　asの左側に入れたものはコンパクト関数と一致していないといけない 
    $followsList as $followingは followsListを-followingっていう一人筒確認していく作業　複数形as単数->