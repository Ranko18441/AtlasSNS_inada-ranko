<x-login-layout>
  
  
  <div class=top_post>
    @if ($user->icon_image != "icon1.png")
      <img src="{{ asset('storage/icons/'.$user->icon_image) }}" alt="アイコン" width="50" height="50" class="icon">
        @else
        <img src="{{ asset('images/' . $user->icon_image) }}" alt="アイコン" width="50" height="50" class="icon">
    @endif
  <form action="{{ route('post') }}" method="POST" class="formtext">
      @csrf <!-- CSRFトークンを追加 -->
      <textarea name="post" class="formcontent"placeholder="投稿内容を入力してください"></textarea>
      <!-- ログインユーザーのアイコンを表示 -->
      <button type="submit" class="button"><img src="images/post.png" alt="" width="32" height="32"></button>
  </form>
  </div>

   <hr  style="border: 4px solid #E0E0E0 ;">
    <!-- width="16" height="16"とすることで画像のサイズを小さくして設定 -->
        
  <!-- バリデーションエラー表示 -->
@if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<!-- ログインしているユーザーとフォローしているユーザーの投稿内容一覧の表示 -->
@foreach ($posts as $post)

<div class="second_post">

  <!-- - 投稿主アイコン -- -->
  @if ($post->user->icon_image != "icon1.png")
  <img src="{{ asset('storage/icons/' . $post->user->icon_image) }}" width="50" height="50" class="icon">
  @else
  <img src="{{ asset('images/' . $post->user->icon_image) }}" width="50" height="50" class="icon">
  @endif
  
  <div class="post-content">
    <span class="topusername">{{ $post-> user -> username }}</span>
    <p class="post-time"><small>{{ $post->created_at->format('Y-m-d H:i:s') }}</small></p>
    <p class="userspost">{{ $post->post }}</p>

  <!-- 編集・削除ボタン -->
    <ul class="Two-Icon">

        @if (Auth::id() === $post->user_id)
            <!--  編集 ---->
            <a href="#" class="modalopen"
               data-target="edit-modal-{{ $post->id }}"
               data-post="{{ $post->post }}"
               data-post-id="{{ $post->id }}">
                <img src="images/edit.png" width="32" height="32">
            </a>

            <!-- -- 削除 ---->
            <a href="#" class="modalopen delete-btn"
               data-target="delete-modal-{{ $post->id }}">
                <img src="images/trash-h.png" width="32" height="32">
            </a>

            @endif

        </ul>

    </div>

</div>

<hr style="border: 2px solid #E0E0E0;">

 <!-- 編集モーダル -- -->

<div class="modal-main js-modal" id="edit-modal-{{ $post->id }}">
    <div class="hmodal-inner">
        <form action="{{ route('postupdate') }}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea name="post" class="modal-textarea"></textarea>
            <button type="submit" class="send-button modaleditClose">
                <img src="images/edit.png" width="32" height="32">
            </button>
        </form>
    </div>
</div>


 <!-- 削除モーダル ---->
<div class="modal-main js-modal" id="delete-modal-{{ $post->id }}">
    <div class="modal-inner">
        <div class="inner-content">
            <p>この投稿を削除します。よろしいですか？</p>
            <form action="{{ route('postdelete', ['id' => $post->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="send-button modalClose">OK</button>
            </form>
            <button class="modalCloseBtnOnly">キャンセル</button>
        </div>
    </div>
</div>

@endforeach

     
        </x-login-layout>


                
    
                

  
    
