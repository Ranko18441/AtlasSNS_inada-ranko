<x-login-layout>


  <h2>機能を実装していきましょう。</h2>

  <form action="{{ route('post') }}" method="POST">
    @csrf <!-- CSRFトークンを追加 -->
    <div>
        <!-- ログインユーザーのアイコンを表示 -->
        @if ($auths->profile_image) <!-- ユーザーがアイコンを持っている場合 -->
        <!-- 'storage/'.$auths->profile_image) }}"の文章は誤っているので、どこかで直す。 -->
            <img src="{{ asset('storage/'.$auths->profile_image) }}" alt="ユーザーアイコン" width="50" height="50">
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
</x-login-layout>
