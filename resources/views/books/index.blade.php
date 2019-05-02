@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h4>Book List</h4>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('books.create') }}">Create New Book List</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <table class="table  table-hover table-sm">
      <tr>
        <th width = "50px">No.</th>
        <th width = "250px"><b>Judul books</b></th>
        <th width = "250px"><b>Penerbit</b></th>
        <th width = "250px"><b>Tahun Terbit</b></th>
        <th width = "250px"><b>Pengarang</b></th>
        <th width = "180px">Action</th>
      </tr>

      @foreach ($bookss as $books)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$books->judul}}</td>
          <td>{{$books->penerbit}}</td>
          <td>{{$books->tahun_terbit}}</td>
          <td>{{$books->pengarang}}</td>
          <td>
            <form action="{{ route('books.destroy', $books->id) }}" method="post">
              <a class="btn btn-sm btn-success" href="{{route('books.show', $books->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('books.edit', $books->id)}}">Update</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

    {!! $bookss->links() !!}

  </div>

@endsection
