@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$user->name}}</h3>
                </div>
                <div class="card-body">
                 {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                </div>
            </div>
        </aside>
    <div class="co-sm-8">
        <ul class="nav nav-tabs nav-justified mb-3">
            {{--ユーザー詳細タブ--}}
            <li class="nav-item"><p>TimeLine</p></li>
            {{-- フォロー一覧タブ --}}
            <li class="nav-item"><p>Followings</p></li>
            {{-- フォロワー一覧タブ --}}
            <li class="nav-item"><p>Followers</p></li>
        </ul>
    </div>
</div>
@endsection
            