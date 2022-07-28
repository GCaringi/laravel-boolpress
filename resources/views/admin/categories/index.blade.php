@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-6">
                <h1>All my categrories</h1>
            </div>
            <div class="col-2 justify-end">
                <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Add new category</a>
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
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a  href= "{{route('admin.categories.show', $category->id)}}" class="btn btn-info">Info</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection