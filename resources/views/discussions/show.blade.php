@extends('layouts.app')

@section('content')

<div class="card">
    @include('partials.discussion-header')
    
        <div class="card-body">
                <div class="text-center">
                    <strong>{{ $discussion->title }}</strong>
                </div>
           <hr>

           {!! $discussion->content !!}
        </div>
</div>

@auth
<div class="card my-5">
    <div class="card-header">
        Add a Reply
    </div>
    <div class="card-body">
        <form action="{{route('replies.store', $discussion->slug)}}" method="POST">
            @csrf
            <input type="hidden" name="reply" id="reply">
            <trix-editor input="reply"></trix-editor>
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