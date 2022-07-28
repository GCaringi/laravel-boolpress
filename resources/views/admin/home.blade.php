@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Dashboard
                        </h2>
                    </div>
                    <div class="panel-body">
                        You are logged in!
                    </div>
                    <a href="{{route('admin.posts.index')}}" class="btn btn-primary">
                        Show all your posts
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection