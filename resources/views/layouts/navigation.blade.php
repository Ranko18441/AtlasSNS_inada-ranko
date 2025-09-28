        <div id="head">
            <h1 class="banner"><a href="{{ route('top') }}"><img src="images/atlas.png" class="banner-img"></a></h1>
            <div id="accordion">
                <button type="button" class="menu-btn"></button>
            <!-- メニューボタンを追加 -->
                <div id="">
                    @if(session('username'))
                    <p class="msg">
                    {{ session('username')}}さん
   <!--  usernameではなく、値を変えてしまうと、直打ちされてしまうので、変数で登録する。-->
                    </p>
                    @endif
                </div>
            <nav class="menu">
                <ul>
                    <li ><a href="{{ route('top') }}">HOME</a></li>
                    <li ><a href="{{ route('profile') }}">プロフィール編集</a></li>
                    <li ><a href="{{ route('logout') }}">ログアウト</a></li>
                </ul>
            </nav>    
            </div>
        </div>


        
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script><!-- ↓この記述でつなげている -->
        <script src="./js/script.js"></script>

        <!-- 下記はJSファイルを作成して読み込むための記述 -->
        <!-- <script src="{{ asset('/js/script.js') }}"></script> -->
        <!-- assetは読み込むという意味！！ -->

