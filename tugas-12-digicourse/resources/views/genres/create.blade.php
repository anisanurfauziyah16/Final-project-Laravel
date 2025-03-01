@extends('layout.master')

@section('title')
Add genre
@endsection
@section('content')
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('genres.store') }}" method="POST">
    @csrf
    <label for="name">Nama Genre:</label> <br>
    <input type="text" name="name" id="name" required> <br> <br>
    <button type="submit" class="btn btn-primary">Submit</button> <br> <br>
</form>

<a href="{{ route('genres.index') }}">Kembali</a>
@endsection