<x-login-layout>

<!-- お名前のところ -->
<div class="profiletitle">
<!-- アイコン画像表示（フォローリストから）-->
<!-- {{ "id,{$User->id}" }} -->
    <img src="{{ asset('storage/icons/'.$User->icon_image) }}" alt="アイコン" width="50" height="50">
    <input type="hidden" name="user_id" value="{{ $User->id }}">


    @if(auth()->user()->is_following($User->id)) 
    <!-- ログインしているユーザーのIDとフォローされているIDを探している。 -->
     <!-- フォロー解除ボタン -->
        <form method="POST" action="{{ route('unfollows') }}">
        @csrf
          <input type="hidden" name="user_id" value="{{ $User->id }}">
          <button type="submit" class="follow-btn" style="margin-left: 130px; background-color:red; color:#FFFAFA;">フォロー解除</button>
       </form>
       @else
      <!-- フォローボタン -->
      <form method="POST" action="{{ route('follows', ['id' => $User->id]) }}">
          @csrf
          <button type="submit" class="follow-btn" style="margin-left: 130px; background-color:#00BFFF; color:white;">フォローする</button>
      </form>
    @endif


<label for="name">ユーザー名</label>
<div>
<p>{{ old('name', $User->username) }}</p>
</div>
    
<label for="bio">自己紹介（任意）</label>
  <div>
		<p>{{ old('bio', $User->bio) }}</p>
	</div>

  <div class="post-content">
      @foreach($Post as $post)
      <!-- {{ "id,{$User->id}" }} -->
    <img src="{{ asset('storage/icons/'.$User->icon_image) }}" alt="アイコン" width="50" height="50">
    <input type="hidden" name="user_id" value="{{ $User->id }}">
    <p>{{ old('name', $User->username) }}</p>
          <p>{{ $post->post }}</p>
          <p><small>{{ $post->created_at->format('Y-m-d H:i:s') }}</small></p> <!-- 投稿日時を表示 -->
            
           @endforeach
          </div>
        </div>
      </x-login-layout>





