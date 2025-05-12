<x-login-layout>
<body>
    <form action="" method="get">
        <input type="search" name="search" placeholder="ユーザ名">
        <input type="image" src="/images/search.png"  width="30" height="30">
    </form>

    <!-- 検索結果の表示 -->
    @if(isset($users))
        @if($users->isNotEmpty())
            <ul>
                @foreach($users as $user)
                    <li>{{ $user->username }}</li>
                    <img src="{{ asset('images/'. $user->icon_image) }}" alt="アイコン" >
                @endforeach
            </ul>
        @else
        @endif
    @endif
</body>
</x-login-layout>
