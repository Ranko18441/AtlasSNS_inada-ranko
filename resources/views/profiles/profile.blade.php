<x-login-layout>

<!-- お名前のところ -->
 
 <div class="profiletitle">
<form method="post" action="{{ route('profile') }}">
	@csrf
    @if ($user->profile_image)
            <img src="{{ asset('storage/'.$user->profile_image) }}" alt="ユーザーアイコン" width="50" height="50">
        @else
            <img src="images/icon1.png" width="32" height="32">
        @endif
   <label for="name">ユーザー名</label>
	<div>
	 <input type="text" name="name" id="name" value="{{ old('name', $user->username) }}" />
	</div>
    
	<label>メールアドレス</label>
	<div>
		<input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" />
	</div>
	
    <label for="password">パスワード</label>
    <div>
    <input type="password" id="password" name="password">
    </div>

    <label for="password_confirmation">パスワード確認</label>
    <div>
    <input type="password" id="password_confirmation" name="password_confirmation">
    </div>
    
    <label for="bio">自己紹介（任意）</label>
    <div>
		<input type="text" name="bio" id="bio" value="{{ old('bio', $user->bio ?? '') }}" />
	</div>
    <label>アイコン画像</label>
	<div>
		<textarea name="body">{{ old('body') }}</textarea>
	</div>

	<input class="btn btn-primary" type="submit" value="更新" />
</form>
</div>








</x-login-layout>
