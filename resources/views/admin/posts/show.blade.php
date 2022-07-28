@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{$post->title}}</h2>
                @if ($post->category)
                    <small>{{$post->category->name}}</small>
                @endif
                <p>{{$post->content}}</p>
                @if (count($post->tags) > 0)
                    <h6>Tags</h6>
                    <ul>
                        @foreach ($post->tags as $tag)
                            <li>{{$tag->name}}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <a href="{{route('admin.posts.index')}}" class="btn btn-primary">Back to Home</a>
    </div>
@endsection