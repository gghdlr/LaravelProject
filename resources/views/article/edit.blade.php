@extends('layout')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/article/{{$article->id}}"  method="post">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label for="exampleInputName">Date</label>
        <input type="date" class="form-control" id="exampleInputData" name="date" value="{{$article->date}}">
    </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name"  value="{{$article->name}}">
    <!-- <small id="text" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputDescriprtion1">Descriprion</label>
    <input type="desc" class="form-control" id="exampleInputDesc" name="desc" value="{{$article->desc}}">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="save" class="btn btn-primary">Update article</button>
</form>
@endsection