@extends('layout.master')

@section('title')
 Genre page
@endsection
@section('content')

 <h1 class="text-primary">{{ $genres->name }}</h1>
 <h2>Detail Genre {{$genres->id}}</h2>

 <h4>List Film</h4>
<div class="row">
    @forelse ( $genres->listFilm as $item)
    <div class="col-4">
       <div class="card">
           <img src="{{asset('assets/'.$item->poster)}}" width="300px" class="mx-auto" alt="...">
           <div class="card-body">
             <h4>{{$item->title}}</h4>
             <p class="card-text">{{Str::limit($item->summary, 50)}}</p>
             <a href="/film/{{$item->id}}" class="btn btn-primary btn-sm btn-block">Detail</a>
             
           </div>
         </div>
   </div>
@empty
    <h4>Tidak ada Film untuk genre ini! </h4>
@endforelse
</div>
 <a href="/genres" class="btn btn-secondary">Back</a>
              
@endsection 