@extends('layout.master')

@section('title')
Add Cast
@endsection
@section('content')
<form action="/casts" method="POST">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @csrf
    <div class="form-group">
      <label>Cast Name</label> <br>
      <input type="text" class="form-controlname" name="name" value="{{old('name')}}">
    </div>
    <div class="form-group">
      <label>age</label>
      <input type="age" class="form-control" name="age"value="{{old('age')}}">
    </div>
    <div>
        <label>Bio</label>
        <textarea name="Bio" class="form-control" cols="30" rows="10">{{ old('Bio') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    
@endsection 