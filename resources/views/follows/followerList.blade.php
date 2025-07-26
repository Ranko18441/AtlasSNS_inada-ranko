<x-login-layout>


  <h2>機能を実装していきましょう。</h2>

  @if($followerList->isEmpty())
    <p>フォロワーはいません。</p>
    @else
    <ul>
        @foreach ($followerList as $follower)
        <a href="{{ route('otherprofile', ['id' => $follower->id]) }}">
            <li><img src="{{ asset('storage/icons/' . $follower->icon_image) }}" alt="アイコン"width="50" height="50">
                <span>{{ $follower->username }}</span>
            </li>
        @endforeach
</a>
    </ul>

    @endif

    @if(isset( $posts ))
    @foreach ($posts as $post)
        <div>
        <!-- 結合演算子 （けつごうえんざんし）　変数と文字列をつなげたいときに持ってくるやり方　変数のものをイメージと繋げる-->
            <p>投稿内容：{{ $post->post }}</p>
        </div>
    @endforeach
    
    @else
        <p>投稿はありません。</p>
    @endif

</x-login-layout>
