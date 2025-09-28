<x-logout-layout>
    <!-- 適切なURLを入力してください -->
<div class=box2>
{!! Form::open(['url' => 'register']) !!}

<h2 class=sinki>新規ユーザー登録</h2>
<ul class="list">
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('メールアドレス') }}
{{ Form::email('email',null,['class' => 'input']) }}

{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}
</ul>

{{ Form::submit('新規登録',['class' => 'custom-form']) }}

<p><a href="login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}
<!-- バリデーションチェックに引っかかった場合、エラーを出させるために下記を記述 -->
@if($errors->any())
        <div class="alert alert-danger"><ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul></div>
    @endif

</div>


</x-logout-layout>
