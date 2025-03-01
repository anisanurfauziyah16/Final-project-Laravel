@extends('layout.master')

@section('title')
 Cast page
@endsection
@section('content')

  <a href="/casts/create" class="btn btn-sm btn-primary mb-3">Add cast</a>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
        @forelse ($casts as $casts)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{ $casts->name}}</td>
            <td> 
                <form action="/casts/{{$casts->id}}"method="POST" onsubmit="return confirm('are you sure delete data?')">
                    @csrf
                    @method('delete')
                    <a href="/casts/{{$casts->id}}" class="btn btn-sm btn-info">Detail</a>
                    <a href="/casts/{{$casts->id}}/edit"class="btn btn-sm btn-warning">Edit</a>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
          </tr>
        @empty
        <tr> 
            <th scope="row">cast data is empty</th>
        </tr>
       <p>No users</p>
        @endforelse
    </tbody>
  </table>
@endsection 