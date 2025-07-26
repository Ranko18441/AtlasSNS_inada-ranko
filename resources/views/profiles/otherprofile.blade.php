<x-login-layout>

<!-- お名前のところ -->
<div class="profiletitle">
<!-- アイコン画像表示（フォローリストから）-->
{{ "id,{$User->id}" }}
    <img src="{{ asset('storage/icons/'.$User->icon_image) }}" alt="アイコン" width="50" height="50">
    <input type="hidden" name="user_id" value="{{ $User->id }}">


@if($User->id !== Auth::id())
@if($User->is_following)
      <!-- フォロー解除ボタン -->
        <form method="POST" action="{{ route('unfollows') }}">
          @csrf
          <input type="hidden" name="user_id" value="{{ $User->id }}">
          <button type="submit" class="follow-btn" style="margin-left: 130px; background-color:red; color:#FFFAFA;">フォロー解除</button>
       </form>
       else
      <!-- フォローボタン -->
      <form method="POST" action="{{ route('follows', ['id' => $User->id]) }}">
          @csrf
          <button type="submit" class="follow-btn" style="margin-left: 130px; background-color:#00BFFF; color:white;">フォローする</button>
      </form>
    @endif
    @endif

<label for="name">ユーザー名</label>
<div>
<input type="text" name="username" id="name" value="{{ old('name', $User->username) }}" />
</div>
    
<label for="bio">自己紹介（任意）</label>
  <div>
		<input type="text" name="bio" id="bio" value="{{ old('bio', $User->bio) }}" />
	</div>

  <div class="post-content">
           @foreach($Post as $post){
          <p>{{ $post->post }}</p>
            }
 
           @endforeach


  </div>
</div>



</x-login-layout>
