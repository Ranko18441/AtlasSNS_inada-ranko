<x-login-layout>


  <h2>機能を実装していきましょう。</h2>

  @if($followerList->isEmpty())
    <p>フォロワーはいません。</p>
    @else
    <ul>
        @foreach ($followerList as $follower)
            <li><img src="{{ asset('images/' . $follower->icon_image) }}" alt="アイコン">
                <span>{{ $follower->username }}</span>
            </li>
        @endforeach
    </ul>
    @endif

    @if(isset( $posts ))
    @foreach ($posts as $post)
        <div>
        <li><img src="{{ asset('images/' . $follower->icon_image) }}" alt="アイコン">
        <!-- 結合演算子 （けつごうえんざんし）　変数と文字列をつなげたいときに持ってくるやり方　変数のものをイメージと繋げる-->
            <p>名前：{{ $post->user->username }}</p>
            <p>投稿内容：{{ $post->post }}</p>
        </div>
    @endforeach
    
    @else
        <p>投稿はありません。</p>
    @endif

</x-login-layout>
