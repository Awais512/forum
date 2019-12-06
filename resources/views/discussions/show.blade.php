@extends('layouts.app')

@section('content')
{{-- <a href="{{route('discussions.index')}}" class="btn btn-info mb-2">Back to Discussions</a> --}}
<div class="card">
    @include('partials.discussion-header')
    
        <div class="card-body">
                <div class="text-center">
                    <strong>{{ $discussion->title }}</strong>
                </div>
           <hr>

           {!! $discussion->content !!}

           @if ($discussion->bestReply)
          <div class="card bg-success my-5" style="color:#fff">
              <div class="card-header">
                  <div class="d-flex justify-content-between">
                       <div>
                            <img width="40px" height="40px" style="border-radius:50px" src="{{Gravatar::src($discussion->bestReply->user->email)}}" alt="">
                        <strong>{{$discussion->bestReply->user->name}}</strong>
                       </div>

                       <div>
                            <strong>Best Reply</strong>
                        </div>
                  </div>
              
              </div>
             
              <div class="card-body">
                {!! $discussion->bestReply->content !!}
              </div>
          </div>
            @endif
   
        </div>
</div>

@foreach ($discussion->replies()->paginate(3) as $reply)
    <div class="card my-5">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                <img style="border-radius:50" width="40px" height="40px" src="{{ Gravatar::src($reply->user->email) }}" alt="">
                <span>{{$reply->user->name}}</span>
                    <div>
                        @if (auth()->user()->id === $discussion->user_id)
                        <form action="{{route('discussions.best-reply', ['discussion'=> $discussion->slug, 'reply'=> $reply->id])}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">Mark as Best Reply</button>
                        </form>
                        @endif
                    </div>
                </div>  
        </div>
        <div class="card-body">
            {!! $reply->content !!}
        </div>
    </div>
</div>
@endforeach
{{$discussion->replies()->paginate(3)->links()}}

@auth
<div class="card my-5">
    <div class="card-header">
        Add a Reply
    </div>
    <div class="card-body">
        <form action="{{route('replies.store', $discussion->slug)}}" method="POST">
            @csrf
            <input type="hidden" name="content" id="content">
            <trix-editor input="content"></trix-editor>
            <button type="submit" class="btn btn-success btn-sm my-2">Reply</button>
        </form>
    </div>
</div>
@else 
<div class="card my-5">
        <div class="card-header">
            <a href="{{ route('login') }}" class="btn btn-info my-2">Sign in to Add a Reply</a>
        </div>
</div>    
@endauth
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
@endsection