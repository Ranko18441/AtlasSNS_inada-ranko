<x-login-layout>
  
  
  <div class=top_post>
    @if ($user->icon_image)
    <img src="{{ asset('storage/icons/'.$user->icon_image) }}" alt="アイコン" width="50" height="50" class="icon">
    @else
    <img src="images/icon1.png" width="32" height="32">
    @endif
  <form action="{{ route('post') }}" method="POST" class="formtext">
      @csrf <!-- CSRFトークンを追加 -->
      <textarea name="post" class="formcontent"placeholder="投稿内容を入力してください"></textarea>
      <button type="submit" class="button"><img src="images/post.png" alt="" width="32" height="32"></button>
    <!-- ログインユーザーのアイコンを表示 -->
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


<!-- ログインしているユーザーの投稿内容一覧の表示 -->
@foreach ($posts as $post)
<!-- ($followsList as $following これを ($posts as $post)の中に入れるのをコントローラーでする) -->
<!-- $postsの中には、postテーブルの中のid、postid~からのすべてのテーブル中の情報全部を送っている -->
  <div class="second_post">
   <!-- ユーザーのアイコン表示 -->
        @if ($user->icon_image)
       <img src="{{ asset('storage/icons/'.$user->icon_image) }}" alt="アイコン" width="50" height="50" class="icon">
       @else
       <img src="images/icon1.png" width="32" height="32" class="icon">
       @endif
    <div class="post-content">
         <p><strong>{{ $post->user->name }}</strong></p>
         <p class="post-time"><small>{{ $post->created_at->format('Y-m-d H:i:s') }}</small></p>
         <p class="userspost">{{ $post->post }}</p>

            <!-- 投稿の時のモーダルの初期の画面-->

       <!-- フォローしているユーザーの投稿を下に記載していく  -->
       <ul class="Two-Icon">    
         <!-- 編集ボタン -->
         <a href="#" class="modalopen"
         data-target="edit-modal-{{ $post->id }}"
         data-post="{{ $post->post }}"
         data-post-id="{{ $post->id }}">
         <img src="images/edit.png" alt="Edit Icon" width="32" height="32">
        </a>
        <!-- 削除ボタン-->
        <div class="modal-type">
          <a href="" class="modalopen delete-btn" data-target="delete-modal-{{ $post->id }}" post="{{$post->post}}">
            <img src="images/trash-h.png" alt="Trash Icon" width="32" height="32">
          </a>
        </div>
      </ul>

     
      
           <!-- 編集の時のモーダルの中身--> 
              <div class="modal-main js-modal" id="edit-modal-{{ $post->id }}">
                <div class="modal-inner">
                  <form action="{{ route('postupdate') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" class="modal-post-id" value="{{ $post->id }}">
                    <textarea name="post" class="modal-textarea"></textarea>
                    <button type="submit" class="send-button modaleditClose">
                      <img src="images/edit.png" alt="Edit Icon" width="32" height="32">
                    </button>
                  </form>
                </div>
              </div>
              
            
              <!-- 同じidは一つのページに一つしか使えない -->
              <!-- 削除の時のモーダルの中身--> 
              <div class="modal-main js-modal" id="delete-modal-{{ $post->id }}">
                <div class="modal-inner">
                  <div class="inner-content">
                    <p>この投稿を削除します。よろしいでしょうか？</p>
                    <form action="{{ route('postdelete', ['id' => $post->id]) }}" method="get" > 
                      @csrf
                      @method('DELETE') <!-- LaravelでDELETEリクエストを送る -->
                      <button type="submit" class="send-button modalClose" >OK</button>
                    </form>
                    <button class="modalCloseBtnOnly">キャンセル</button>
                  </div>
                </div>
              </div>

              <!-- jQuery -->  
    </div>
            
  </div>
  <hr  style="border: solid #E0E0E0 ;">
  @endforeach
     
        </x-login-layout>


                
    
                

  
    
