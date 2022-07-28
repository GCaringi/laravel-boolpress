@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Create new tag</h1>
            <form action="{{route('admin.tags.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                    @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
  </div>
@endsection