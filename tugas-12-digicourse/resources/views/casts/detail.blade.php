@extends('layout.master')

@section('title')
 Cast page
@endsection
@section('content')

 <h1 class="text-primary">{{ $casts->name }}</h1>
 <p>{{ $casts->age}}</p>
 <p>{{ $casts->bio}}</p>

 <a href="/casts" class="btn btn-secondary">Back</a>
              
@endsection 