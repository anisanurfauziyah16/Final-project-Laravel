@extends('layout.master')

@section('title')
 Film page
@endsection
@section('content')
<a href="/film" class="btn btn-secondary">Back</a>
<div class="d-flex justify-content-center">
    <img src="{{asset('assets/'. $film->poster)}}" alt="">
</div>
 <h1 class="text-primary mt-3">{{ $film->title }}</h1>
 <p>{{ $film->summary}}</p>
 <p>{{ $film->release_year}}</p>
 
 <hr>
 <h4 class="text-info">List review</h4>

 @forelse ( $film->ListReview as $item )
 <div class="card">
    <div class="card-header bg-dark">
      {{ $item->user->name }}
    </div>
    <div class="card-body">
      <p class="card-text">{{ $item->content }}</p>
    </div>
  </div>
 @empty
     <h5>Tidak ada review saat ini</h5>
 @endforelse

 @auth
 <form action="/reviews/{{ $film->id }}" method="POST">
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
    <div class="form-group ">
      <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Buat review"></textarea>
      </div>
      <div class="form-group">
        <label for="point">Point (1-10):</label>
        <input type="number" name="point" id="point" min="1" max="10" required>
        </div>
<button type="submit" class="btn btn-primary btn-block">Add review</button>
</form> 
 @endauth 
@endsection 