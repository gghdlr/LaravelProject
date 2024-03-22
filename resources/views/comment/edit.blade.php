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

<form action="/comment/{{$comment->id}}"  method="post">
    @csrf
    @method("PUT")
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title"  value="{{$comment->title}}">
    <!-- <small id="text" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputDescriprtion1">Descriprion</label>
    <input type="desc" class="form-control" id="exampleInputDesc" name="text" value="{{$comment->text}}">
  </div>
  <button type="submit" class="btn btn-primary">Update comment</button>
</form>
@endsection