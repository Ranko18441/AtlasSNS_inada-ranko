<x-login-layout>

<!-- お名前のところ -->
<div class="otherprofiletitle">
  <div class="profilecontent">
<!-- アイコン画像表示（フォローリストから）-->
<!-- {{ "id,{$User->id}" }} -->
    <img src="{{ asset('storage/icons/'.$User->icon_image) }}" alt="アイコン" width="50" height="50" class="icon">
    <input type="hidden" name="user_id" value="{{ $User->id }}">
    @if(auth()->user()->is_following($User->id)) 
    <!-- ログインしているユーザーのIDとフォローされているIDを探している。 -->
     <!-- フォロー解除ボタン -->
      <form method="POST" action="{{ route('unfollows') }}">
        @csrf
          <input type="hidden" name="user_id" value="{{ $User->id }}">
          <button type="submit" class="otherfollow-btn" style="margin-left: 130px; background-color:red; color:#FFFAFA;">フォロー解除</button>
       </form>
       @else
      <!-- フォローボタン -->
      <form method="POST" action="{{ route('follows', ['id' => $User->id]) }}">
          @csrf
          <button type="submit" class="otherfollow-btn" style="margin-left: 130px; background-color:#00BFFF; color:white;">フォローする</button>
      </form>
    @endif


  <div class="otherusername">
  <label for="name">ユーザー名</label>
  <p>{{ old('name', $User->username) }}</p>
  </div>

  <div class="otherbio">  
  <label for="bio">自己紹介</label>
  <p>{{ old('bio', $User->bio) }}</p>
  </div>

  </div>

<hr style="border: 4px solid #E0E0E0;  margin-left: -100px; margin-right: 90px;">
  <div class="post-content">
      @foreach($Post as $post)
      <!-- {{ "id,{$User->id}" }} -->
    <img src="{{ asset('storage/icons/'.$User->icon_image) }}" alt="アイコン" width="50" height="50" class="icon">
    <input type="hidden" name="user_id" value="{{ $User->id }}">
    <div class="posting-content">
    <p>{{ old('name', $User->username) }}</p>
     <p>{{ $post->post }}</p>
    </div>
          <p class="posting-time"><small>{{ $post->created_at->format('Y-m-d H:i:s') }}</small></p> <!-- 投稿日時を表示 -->
           <hr style="border: solid #E0E0E0;  margin-left: -100px; margin-right: 90px;">
           
          @endforeach
          </div>
      </div>

      </x-login-layout>





