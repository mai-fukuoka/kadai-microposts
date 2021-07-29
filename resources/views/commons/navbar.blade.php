<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        {{--トップページのリンク--}}
  
    <a class="navbar-brand" href="/">Microposts</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        @if (Auth::check())
        {{--ユーザー一覧ページ--}}
        <li class="nav-item">{!! link_to_route('users.index', 'Users', [], ['class' => 'nav-link']) !!}</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
          <ul class="dropdown-menu dropdown-menu-right">
          {{-- ユーザ詳細ページへのリンク --}}
          <li class="dropdown-item">{!! link_to_route('users.show', 'My profile', ['user' => Auth::id()]) !!}</li>
           <li class="dropdown-divider"></li>
            {{-- ログアウトへのリンク --}}
            <li class="dropdown-item">{!! link_to_route('logout.get', 'Logout') !!}</li>
           </ul>
          
        </li>
        </ul>
        @else
        {{-- ユーザー登録ページのリンク --}}
        <li class="nav-item">
          {!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}
        </li>
        {{--ログインのリンク --}}
        <li class="nav-item">
          {!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}
         </li>
        @endif  
       </ul>
  </div>
</nav>
</header>