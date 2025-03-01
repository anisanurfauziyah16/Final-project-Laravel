@extends('layout.master')

@section('title')
Edit films
@endsection
@section('content')
<form action="/film/{{$film->id}}" method="POST" enctype="multipart/form-data">
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
    @method('PUT')
    <div class="form-group">
      <label>title</label> <br>
      <input type="text" class="form-controlname" name="title" value="{{old('title', $film->title)}}">
    </div>
    <div>
        <label>summary</label>
        <textarea name="summary" class="form-control" cols="30" rows="10">{{ old('summary', $film->summary) }}</textarea>
    </div>
    <div class="form-group">
      <label>release_year</label>
      <input type="release_year" class="form-control" name="release_year"value="{{old('release_year', $film->release_year)}}">
    </div>
    <div>
        <label>poster</label>
        <input type="file" class="form-control" name="poster">
    </div>
    <div class="form-group">
        <label>genres</label> 
        <select name="genre_id" id="" class="form-control">
             <option value="">pilih genre</option>
             @forelse ($genres as $item)
             @if ($item->id === $film->genre_id)
             <option value="{{$item->id}}" selected>{{$item->name}}</option>
             @else
             <option value="{{$item->id}}">{{$item->name}}</option>  
             @endif
             @empty
             <option value="">belum ada genre</option> 
             @endforelse
        </select> 
      </div>
      <div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
    
@endsection 