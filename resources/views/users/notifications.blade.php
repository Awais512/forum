@extends('layouts.app')

@section('content')

<div class="card">
        <div class="card-header">Notifications</div>

        <div class="card-body">
            <ul class="list-group">
                @foreach ($notifications as $notification)
                    <li class="list-group-item">
                        @if ($notification->type=== 'App\Notifications\NewReply')
                            A new Reply has been added to your Discussion:
                            <strong>{{$notification->data['discussion']['title']}}</strong>
                            <a href="{{route('discussions.show', $notification->data['discussion']['slug'] )}}" class="btn btn-sm btn-success float-right">View</a>
                        @endif

                        @if ($notification->type=== 'App\Notifications\ReplyMarkedAsBest')
                            Reply has been marked as best: 
                            <strong>{{$notification->data['discussion']['title']}}</strong>
                            <a href="{{route('discussions.show', $notification->data['discussion']['slug'] )}}" class="btn btn-sm btn-success float-right">View</a>

                        @endif
                    </li>
                @endforeach       
            </ul>
        </div>
    </div>
@endsection
