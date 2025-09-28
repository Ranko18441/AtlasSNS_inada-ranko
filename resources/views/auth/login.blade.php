<x-logout-layout>
<!-- 適切なURLを入力してください -->
   <div class=box1>
  {!! Form::open(['url' => 'login']) !!}
  <!-- 初期設定がpost通信になっているので、post通信で/loginに飛ばす-->

  <p>AtlasSNSへようこそ</p>

  <ul class="list">
 {{ Form::label('メールアドレス') }}
 {{ Form::text('email',null,['class' => 'input']) }}
 {{ Form::label('パスワード') }}
  </ul>
  {{ Form::password('password',['class' => 'input']) }}
  {{ Form::submit('ログイン' ,['class' => 'custom-form']) }}
  <p><a href="register" class="register">新規ユーザーの方はこちら</a></p>
 
   {!! Form::close() !!}
  </div>

</x-logout-layout>

