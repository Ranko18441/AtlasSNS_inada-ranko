<x-login-layout>

<!-- お名前のところ -->
 
<div class="profiletitle">
<form method="post" action="{{ route('profile') }} " enctype="multipart/form-data">
	@csrf
    @if ($user->icon_image)
  <img src="{{ asset('storage/icons/'.$user->icon_image) }}" alt="アイコン" width="50" height="50" class="profileicon">
    @else
    <img src="images/icon1.png" width="32" height="32" class="icon">
     @endif
  <label for="name" class="profilename">ユーザー名</label>

	<div>
	<input type="text" name="username" id="name"  value="{{ old('name', $user->username) }}" class="form-input"/>
	</div>
    
	<label class="profilename">メールアドレス</label>
	<div><input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-input" /></div>

  <label for="password" class="profilename">パスワード</label>
	<div><input type="password" id="password" name="password" class="form-input"></div>

  <label for="password_confirmation" class="profilename">パスワード確認</label>
  <div><input type="password" id="password_confirmation" name="password_confirmation" class="form-input"></div>
    
  <label for="bio" class="profilename">自己紹介（任意）</label>
  <div><input type="text" name="bio" id="bio" value="{{ old('bio', $user->bio) }}" class="form-input" /></div>


  <label class="profilename">アイコン画像</label>
	 <div><input type="file" name="icon_image" class="form-aiconinput">
    @error('icon_image')
    <div class="text-danger">{{ $message }}</div>
    @enderror
  <!-- @if ($user->icon_image)
  <img src="{{ asset('storage/icons/'.$user->icon_image) }}" alt="アイコン" width="50" height="50" class="icon">
  @endif -->
  <input class="update-btn" type="submit" value="更新" />
  </div>
</form>
@if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif


</div>










</x-login-layout>
