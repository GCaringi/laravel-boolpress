@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-6">
                <h1>All my posts</h1>
            </div>
            <div class="col-2 justify-end">
                <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Create new post</a>
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Published</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td>{{$post->content}}</td>
                                <td>{{$post->category->name}}</td>
                                <td>
                                    @foreach ($post->tags as $tag)
                                        <span class="badge badge-primary">{{$tag->name}}</span>
                                    @endforeach
                                </td>
                                <td>{{$post->published ? 'Yes' : 'No'}}</td>
                                <td>

                                    <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a  href= "{{route('admin.posts.show', $post->id)}}" class="btn btn-info">Info</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection