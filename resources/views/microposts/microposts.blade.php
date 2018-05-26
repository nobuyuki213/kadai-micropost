<ul class="media-list">
@foreach($microposts as $micropost)
    <?php  $user = $micropost->user; ?>
    <li class="media">
        <div class="media-left">
            <a href="#">
            <img class="media-object img-responsive img-rounded" src="{{ Gravatar::src($user->email, 100) }}" alt="">
            </a>
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id], ['class' => 'btn btn-primary btn-xs']) !!}
            </div>
            <div>
                <P>{!! nl2br(e($micropost->content)) !!}</P>
            </div>
            <div class="">
                @if (Auth::user()->id == $micropost->user_id)
                    {!! Form::open(['route' => ['microposts.destroy', $micropost->id,], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
<div class="text-center">
    {!! $microposts->render() !!}
</div>