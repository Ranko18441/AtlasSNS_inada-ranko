        <div id="head">
            <h1><a href="{{ route('top') }}"><img src="images/atlas.png"></a></h1>
            <div id="accordion">
            <!-- メニューボタンを追加 -->
        <button type="button" class="menu-btn"></button>
                <div id="">
                    <p>〇〇さん</p>
                </div>
            <nav class="menu">
                <ul>
                    <li ><a href="{{ route('top') }}">HOME</a></li>
                    <li ><a href="{{ route('profile') }}">プロフィール編集</a></li>
                    <li ><a href="">ログアウト</a></li>
                </ul>
            </nav>    
            </div>
        </div>


        
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script><!-- ↓この記述でつなげている -->
        <script src="./js/script.js"></script>

        <!-- 下記はJSファイルを作成して読み込むための記述 -->
        <!-- <script src="{{ asset('/js/script.js') }}"></script> -->
        <!-- assetは読み込むという意味！！ -->

