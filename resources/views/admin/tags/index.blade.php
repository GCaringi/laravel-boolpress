@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-6">
                <h1>All my tags</h1>
            </div>
            <div class="col-2 justify-end">
                <a href="{{route('admin.tags.create')}}" class="btn btn-primary">Create new tag</a>
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{$tag->name}}</td>
                                <td>
                                    <a href="{{route('admin.tags.edit', $tag->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('admin.tags.destroy', $tag->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a  href= "{{route('admin.tags.show', $tag->id)}}" class="btn btn-info">Info</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection