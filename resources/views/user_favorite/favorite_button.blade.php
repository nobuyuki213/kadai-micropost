<!--条件分岐:ログインユーザがポストをお気に入りしているかの確認-->
@if (Auth::user()->is_favorite($micropost->id))
    <!--true:お気に入り解除実行ボタン-->
    {!! Form::open(['route' => ['user.unfavorite', $micropost->id], 'method' => 'delete']) !!}
        {!! Form::submit('unfavorite', ['class' => 'btn btn-success btn-xs']) !!}
    {!! Form::close() !!}
@else
    <!--false:お気に入り実行ボタン-->
    {!! Form::open(['route' => ['user.favorite', $micropost->id]]) !!}
        {!! Form::submit('favorite', ['class' => 'btn btn-primary btn-xs']) !!}
    {!! Form::close() !!}
@endif