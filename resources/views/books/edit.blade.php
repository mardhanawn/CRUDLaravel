@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Update books</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Ups!</strong> there where some problem with your input.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('books.update', $books->id) }}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Judul</strong>
          <input type="text" name="judul" class="form-control" value="{{$books->judul}}">
        </div>
        <div class="col-md-12">
          <strong>Penerbit</strong>
          <input type="text" name="penerbit" class="form-control" value="{{$books->penerbit}}">
        </div>
        <div class="col-md-12">
          <strong>Tahun Terbit</strong>
          <input class="form-control" value="{{$books->alamat}}" name="tahun_terbit">
        </div>
        <div class="col-md-12">
          <strong>Pengarang</strong>
          <input class="form-control" value="{{$books->pengarang}}" name="pengarang">
        </div>
        <div class="col-md-12"><br>
          <a href="{{route('books.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Save</button>
        </div>
      </div>
    </form>

  </div>
@endsection
