@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{$category->name}}</h2>
        </div>
        <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Back to Home</a>
    </div>
@endsection