<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        {{--トップページのリンク--}}
  
    <a class="navbar-brand" href="/">Microposts</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          {!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
         </li>
            
       </ul>
  </div>
</nav>
</header>