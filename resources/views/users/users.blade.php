<div style="margin-top: 0.5em;">
    @if(count($users) > 0)
    <ul class="media-list">
        @foreach($users as $user)
            <li class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object img-thumbnail img-responsive" src="{{ Gravatar::src($user->email, 50) }}" alt="">
                    </a>
                </div>
                <div class="media-body">
                    <div class="">
                        <h4 class="media-heading">{{ $user->name }}</h4>
                    </div>
                    <div class="">
                        {!! link_to_route('users.show', 'View Profile', ['id' => $user->id], ['class' => 'btn btn-primary btn-xs']) !!}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    <div class="text-center">
        {!! $users->render() !!}
    </div>
    @endif
</div>