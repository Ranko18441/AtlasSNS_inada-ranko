<x-login-layout>


  <h2>機能を実装していきましょう。</h2>

  @if($followerList->isEmpty())
    <p>フォロワーはいません。</p>
    @else
    <ul>
        @foreach ($followerList as $follower)
            <li><img src="{{ asset('images/' . $follower->icon_image) }}" alt="アイコン">
                <span>{{ $follower->username }}</span>
            </li>
        @endforeach
    </ul>
    @endif

</x-login-layout>
