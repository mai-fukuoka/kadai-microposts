@if (Auth::id() != $micropost->id)
    @if (Auth::user()->is_favoriting($micropost->id))
        {{-- アンファボボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-danger sm"]) !!}
        {!! Form::close() !!}
    @else
        {{-- ファボボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.favorite', $micropost->id]]) !!}
            {!! Form::submit('Favorite', ['class' => "btn btn-primary btn-sm"]) !!}
        {!! Form::close() !!}
    @endif
@endif