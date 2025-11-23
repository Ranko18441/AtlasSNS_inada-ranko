    
      <h1 class="banner"><a href="{{ route('top') }}"><img src="{{ asset('images/atlas.png')}}" class="banner-img"></a>
       <!-- ユーザーのアイコン表示 -->
      <img src="{{ asset('storage/icons/'.auth()->user()->icon_image) }}" alt="icon" width="32" height="32" class="banner_icon">
      
      
      
    
    </h1>
       <p class="myname">{{auth()->user()->username}}さん</P>
         
<!--  usernameではなく、値を変えてしまうと、直打ちされてしまうので、変数で登録する。-->
       
       <div id="accordion">
        <button type="button" class="menu-btn"></button> 
            <!-- メニューボタンを追加 -->
            <nav class="menu">
                <ul class="modalcharacter">
                    <li><a href="{{ route('top') }}">HOME</a></li>
                    <li><a href="{{ route('profile') }}">プロフィール編集</a></li>
                    <li><a href="{{ route('logout') }}">ログアウト</a></li>
                </ul>
            </nav>    
        </div>
    


        
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script><!-- ↓この記述でつなげている -->
        <script src="./js/script.js"></script>

        
