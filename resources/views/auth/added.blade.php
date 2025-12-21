<x-logout-layout>


  <div id="clear">
  <p class="msg">
  {{ session('username') }}さん
</p>
    <p>ようこそ！AtlasSNSへ！</p>

    <ul class="addtext">
   <p >ユーザー登録が完了いたしました。早速ログインをしてみましょう。</p>
    </ul>
    <p class="addcustom-form"><a href="login">ログイン画面へ</a></p>
  
  </div>
</x-logout-layout>
