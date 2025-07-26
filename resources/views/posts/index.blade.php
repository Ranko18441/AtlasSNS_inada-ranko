<x-login-layout>


  <h2>機能を実装していきましょう。</h2>

  <form action="{{ route('post') }}" method="POST">
    @csrf <!-- CSRFトークンを追加 -->
    <div>
        <!-- ログインユーザーのアイコンを表示 -->
        @if ($user->icon_image)
       <img src="{{ asset('storage/icons/'.$user->icon_image) }}" alt="アイコン" width="50" height="50">
       @else
            <img src="images/icon1.png" width="32" height="32">
        @endif
        </div>
    <textarea name="post" placeholder="投稿内容を入力してください"></textarea>
    <button type="submit"><img src="images/post.png" alt="" width="32" height="32"></button>
    <!-- width="16" height="16"とすることで画像のサイズを小さくして設定 -->
</form>
        
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
  <!-- $postsの中には、postテーブルの中のid、postid~からのすべてのテーブル中の情報全部を送っている -->
    <div class="post">
        <!-- ユーザーのアイコン表示 -->
        @if ($user->icon_image)
       <img src="{{ asset('storage/icons/'.$user->icon_image) }}" alt="アイコン" width="50" height="50">
       @else
            <img src="images/icon1.png" width="32" height="32">
        @endif


        <div class="post-content">
            <p><strong>{{ $post->user->name }}</strong>さんの投稿</p>
            <p>{{ $post->post }}</p>


            <!-- 投稿の時のモーダルの初期の画面-->
            <!-- <div class="modal-type">
                <a href="" class="modalopen" data-target="edit-modal-{{ $post->id }}" post="{{$post->post}}" post_id="{{$post->id}}" value="{{ $post->post }}">
                    上の記述は post="{{$post->post}}" post_id="{{$post->id}}"にジャバスクリプトに投げる　表示させる-->
                    <!-- <img src="images/edit.png"  alt="Edit Icon" width="32" height="32">
                    </a>
            </div> --> 

            <!-- 編集ボタン -->
            <a href="#" class="modalopen"
               data-target="edit-modal-{{ $post->id }}"
               data-post="{{ $post->post }}"
               data-post-id="{{ $post->id }}">
              <img src="images/edit.png" alt="Edit Icon" width="32" height="32">
            </a>
            
            <!-- 削除の時のモーダルの初期の画面-->
            <div class="modal-type">
                <a href="" class="modalopen delete-btn" data-target="delete-modal-{{ $post->id }}" post="{{$post->post}}">
                    <img src="images/trash-h.png" alt="Trash Icon" width="32" height="32">
                    </a>
            </div>




            <!-- 投稿の時のモーダルの中身            
            <div class="modal-main js-modal" id="edit-modal-{{ $post->id }}">① -->
              <!-- <div class="modal-inner">② -->
                <!-- <div class="inner-content">
                  <p class="inner-title"></p> --> 
                   <!-- 編集の時のモーダル本体 -->
                  <div class="modal-main js-modal" id="edit-modal-{{ $post->id }}">
                    <div class="modal-inner">
                      <form action="{{ route('postupdate') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" class="modal-post-id" value="{{ $post->id }}">
                        <textarea name="post" class="modal-textarea"></textarea>
                        <button type="submit">
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
                       <form action="{{ route('postdelete', ['id' => $post->id]) }}" method="post">
                         @csrf
                         @method('DELETE') <!-- LaravelでDELETEリクエストを送る -->
                         <button type="submit" class="send-button modalClose">
                           <!-- 削除フォーム ボタン-->
                           <img src="images/trash-h.png" alt="Trash Icon" width="32" height="32"> 削除する
                         </button>
                       </form>
                       <button class="modalCloseBtnOnly">キャンセル</button>
                     </div>
                   </div>
                  </div>
                  
                  <!-- jQuery -->
                  <p><small>{{ $post->created_at->format('Y-m-d H:i:s') }}</small></p> <!-- 投稿日時を表示 -->
                </div>
            </div>
          @endforeach


          
        
        </x-login-layout>

                
    
                

  
    
