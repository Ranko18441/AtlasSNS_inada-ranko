<x-logout-layout>


  <div id="clear">
  @if(session('username'))
   <p class="msg">
   {{ session('username')}}さん
   <!--  usernameではなく、値を変えてしまうと、直打ちされてしまうので、変数で登録する。-->
   </p>
   @endif
    <p>ようこそ！AtlasSNSへ！</p>
    <p>ユーザー登録が完了しました。</p>
    <p>早速ログインをしてみましょう。</p>

    <p class="btn"><a href="login">ログイン画面へ</a></p>
  
  </div>
</x-logout-layout>
