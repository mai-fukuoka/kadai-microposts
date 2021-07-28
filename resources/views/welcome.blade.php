@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the Microposts</h1>
            {{--ユーザー登録ページのリンク--}}
            {!! link_to_route('signup.get','Sign up npw!',[],['class'=>'btn btn-lg btn-primary']) !!}
        </div>
    </div>
@endsection