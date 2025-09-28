<x-login-layout>
    <body>
        <form action="" method="get" class="user_search">
            <input type="search" name="search" placeholder="ユーザ名" class="search_form">
            <input type="image" src="/images/search.png" class="search_png" width="34" height="34">

            {{-- 検索ワードの表示 --}}
            @if(!empty($search))
                <span style="margin-left: 130px;">検索ワード: {{ $search }}</span>
            @endif
        </form>

        <hr  style="border: 4px solid #E0E0E0 ;">
        <!-- 検索結果の表示 -->
        @if(isset($users) && $users->isNotEmpty())
            <ul class="user_search_content">
                @foreach($users as $user)
                    <li class="search_username">{{ $user->username }}</li>
                    @if ($user->icon_image)
                        <img src="{{ asset('storage/icons/'.$user->icon_image) }}" alt="アイコン" width="50" height="50" class="icon">
                    @else
                        <img src="{{ asset('images/' . $user->icon_image) }}" alt="アイコン" class="icon">
                    @endif

                    @if($user->id !== Auth::id())
                        @if($user->is_following)
                            <!-- フォロー解除ボタン -->
                            <form method="POST" action="{{ route('unfollows') }}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button type="submit" class="follow-btn" style="margin-left: 130px; background-color:red; color:#FFFAFA;">フォロー解除</button>
                            </form>
                        @else
                            <!-- フォローボタン -->
                            <form method="POST" action="{{ route('follows', ['id' => $user->id]) }}">
                                @csrf
                                <button type="submit" class="follow-btn" style="margin-left: 130px; background-color:#00BFFF; color:white;">フォローする</button>
                            </form>
                        @endif
                    @endif
                @endforeach
            </ul>
        @endif
    </body>
</x-login-layout>