<ul class="media-list" style="margin-top: 0.5em;">
@foreach($microposts as $micropost)
    <?php  $user = $micropost->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id], ['class' => 'btn btn-default btn-xs']) !!}
            </div>
            <div>
                <P>{!! nl2br(e($micropost->content)) !!}</P>
            </div>
            <ul class="nav nav-pills">
                <li role="presentation">
                    @include('user_favorite.favorite_button', ['micropost' => $micropost])
                </li>
                <li role="presentation">
                    @if (Auth::user()->id == $micropost->user_id)
                        {!! Form::open(['route' => ['microposts.destroy', $micropost->id,], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    @endif
                </li>
            </ul>
        </div>
    </li>
@endforeach
</ul>
<div class="text-center">
    {!! $microposts->render() !!}
</div>