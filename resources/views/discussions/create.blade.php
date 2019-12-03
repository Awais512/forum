@extends('layouts.app')

@section('content')

<div class="card">
        <div class="card-header">Create Discussion</div>

        <div class="card-body">
        <form action="{{route('discussions.store')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="">
            </div>

            <div class="form-group">
                <label for="content">content</label>
                <textarea id="content" class="form-control" cols="5" rows="5" name="content" value=""></textarea>
            </div>

            <div class="form-group">
                <label for="channel">Channel</label>
                <select name="channel" id="channel" class="form-control">
                    <option value="">Please Select...</option>
                    @foreach ($channels as $channel)
                    <option value="{{$channel->id}}">{{$channel->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Create Discussion</button>
        </form>
        </div>
    </div>
@endsection
