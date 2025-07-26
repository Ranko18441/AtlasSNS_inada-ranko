<x-login-layout>

<!-- お名前のところ -->
 
 <div class="profiletitle">
<form method="post" action="{{ route('profile') }} " enctype="multipart/form-data">
	@csrf
    @if ($user->icon_image)
  <img src="{{ asset('storage/icons/'.$user->icon_image) }}" alt="アイコン" width="50" height="50">
    @else
            <img src="images/icon1.png" width="32" height="32">
        @endif
   <label for="name">ユーザー名</label>
	<div>
	 <input type="text" name="username" id="name" value="{{ old('name', $user->username) }}" />
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
		<input type="text" name="bio" id="bio" value="{{ old('bio', $user->bio) }}" />
	</div>
    <label>アイコン画像</label>
	 <input type="file" name="icon_image">
     @error('icon_image')
      <div class="text-danger">{{ $message }}</div>
    @enderror

    @if ($user->icon_image)
  <img src="{{ asset('storage/icons/'.$user->icon_image) }}" alt="アイコン" width="50" height="50">
    @endif

	<input class="btn btn-primary" type="submit" value="更新" />

</form>
@if($errors->any())
        <div class="alert alert-danger"><ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul></div>
    @endif
</div>










</x-login-layout>
