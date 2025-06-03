<x-login-layout>


  <h2>機能を実装していきましょう。</h2>

    @if($followsList->isEmpty())
    <p>フォローしているユーザーはいません。</p>
    @else
    <ul>
        @foreach ($followsList as $following)
            <li><img src="{{ asset('images/' . $following->icon_image) }}" alt="アイコン">
                <span>{{ $following->name }}</span>
            </li>
        @endforeach
    </ul>
    @endif 
    
      <!--endif がここまでですよという意味　 foreachの後には endforeach　elseifがそうじゃなければ -->
    </x-login-layout>

    <!-- どうしても変数を使いたいというときは、コンパクト関数にいれたものを使う　followsList　asの左側に入れたものはコンパクト関数と一致していないといけない 
    $followsList as $followingは followsListを-followingという変数に直したっていうだけ->