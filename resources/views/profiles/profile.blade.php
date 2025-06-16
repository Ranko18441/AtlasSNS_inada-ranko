<x-login-layout>

<!-- お名前のところ -->
 
 <div class="profiletitle">
<form method="post" action="">
	@csrf
    @if ($user->profile_image)
            <img src="{{ asset('storage/'.$user->profile_image) }}" alt="ユーザーアイコン" width="50" height="50">
        @else
            <img src="images/icon1.png" width="32" height="32">
        @endif
   <label for="name">ユーザー名</label>
	<div>
	 <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" />
	</div>
	<label>メールアドレス</label>
	<div>
		<input type="text" name="title" value="{{ old('title') }}" />
	</div>
	
    <label for="password">パスワード</label>
    <div>
    <input type="password" id="password" name="password">
    </div>

    <label for="password_confirmation">パスワード確認</label>
    <div>
    <input type="password" id="password_confirmation" name="password_confirmation">
    </div>
    
    <label>自己紹介</label>
    <div>
		<input type="text" name="title" value="{{ old('title') }}" />
	</div>
    <label>アイコン画像</label>
	<div>
		<textarea name="body">{{ old('body') }}</textarea>
	</div>

	<input class="btn btn-primary" type="submit" value="更新" />
</form>
</div>








</x-login-layout>
