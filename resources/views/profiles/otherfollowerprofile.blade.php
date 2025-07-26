<x-login-layout>

<!-- お名前のところ -->
 
 <div class="profiletitle">
<form method="post" action="{{ route('profile') }} " enctype="multipart/form-data">
	@csrf
  @if ($follower->followed->icon_image)
  data-target="delete-modal-{{ $follower->followed->id }}"
    <img src="{{ asset('storage/icons/' . $follower->followed()->icon_image) }}" alt="アイコン" width="50" height="50">
  @endif
        
   <input type="hidden" name="user_id" value="{{ $user->id }}">
	<@if($user->id !== Auth::id())
    @if($user->is_following)
      <!-- フォロー解除ボタン -->
        <form method="POST" action="{{ route('unfollows') }}">
          @csrf
          <input type="hidden" name="user_id" value="{{ $user->id }}">
          <button type="submit" class="follow-btn" style="margin-left: 130px; background-color:red; color:#FFFAFA;">フォロー解除</button>
      </form>
      else
      <!-- フォローボタン -->
      <form method="POST" action="{{ route('follows', ['id' => $user->id]) }}">
          @csrf
          <button type="submit" class="follow-btn" style="margin-left: 130px; background-color:#00BFFF; color:white;">フォローする</button>
      </form>
  @endif
 @endif
   
   <label for="name">ユーザー名</label>
	<div>
	 <input type="text" name="username" id="name" value="{{ old('name', $follower->username) }}" />
	</div>
    
  <label for="bio">自己紹介（任意）</label>
    <div>
		<input type="text" name="bio" id="bio" value="{{ old('bio', $follower->bio) }}" />
	</div>

</form>
</div>
</x-login-layout>
