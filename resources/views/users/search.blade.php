<x-login-layout>
<body>
    <form action="" method="get">
        <input type="search" name="search" placeholder="ユーザ名">
        <input type="image" src="/images/search.png"  width="30" height="30">

        {{-- 検索ワードの表示（検索された時だけ） --}}
    @if(!empty($search))
        <span style="margin-left: 130px;">検索ワード: {{ $search }}</span>
    @endif

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
