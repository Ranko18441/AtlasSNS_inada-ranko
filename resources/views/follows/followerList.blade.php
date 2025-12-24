<x-login-layout>


  @if($followerList->isEmpty())
  <h4>フォロワーリスト</h4> 
    <p>フォロワーはいません。</p>
    @else
    <div class="list_icon">
         <h4>フォロワーリスト</h4> 
        @foreach ($followerList as $follower)
        <a href="{{ route('otherprofile', ['id' => $follower->id]) }}">
        @if ($follower->icon_image != "icon1.png")
        <img src="{{ asset('storage/icons/' . $follower->icon_image) }}" alt="アイコン"width="50" height="50" class="icon">
        @else
        <img src="{{ asset('images/' . $follower->icon_image) }}" alt="アイコン" width="50" height="50" class="icon">
        @endif
        </a>
            @endforeach
        </div>
         
        <hr  style="border: 4px solid #E0E0E0 ;">
        
        @endif
        
        @if(isset( $posts ))
        @foreach ($posts as $post)
        <div class="fouserspost">
            <div class="seconduserspost">   
            <img src="{{ asset('storage/icons/' . $post-> user -> icon_image) }}" alt="アイコン"width="50" height="50" class="icon">
            <!-- . 結合演算子 （けつごうえんざんし）　変数と文字列をつなげたいときに持ってくるやり方　変数のものをイメージと繋げる-->
            <span>{{ $post-> user -> username }}</span>
            <p><small>{{ $post->created_at->format('Y-m-d H:i:s') }}</small></p>
            </div>
            <p>投稿内容：{{ $post->post }}</p>
            </div>

        <hr  style="border: solid #E0E0E0 ;">
    @endforeach
    
    @else
        <p>投稿はありません。</p>
    @endif

</x-login-layout>
