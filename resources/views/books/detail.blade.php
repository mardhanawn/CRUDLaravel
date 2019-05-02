@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>Detail books</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Judul books </strong> {{$books->judul}}
        </div>
        <div class="form-group">
          <strong>Penerbit : </strong> {{$books->penerbit}}
        </div>
        <div class="form-group">
          <strong>Tahun Terbit : </strong> {{$books->tahun_terbit}}
        </div>
        <div class="form-group">
          <strong>Pengarang : </strong> {{$books->pengarang}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('books.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection
