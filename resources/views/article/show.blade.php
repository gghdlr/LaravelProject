@extends('layout')
@section('content')
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{$article->name}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{$article->desc}}</h6>
    <div class="btn-toolbar">
    <a href="/article/{{$article->id}}/edit" class="btn btn-primary mr-3">Edit article</a>
    <form action="/article/{{$article->id}}" method="post">
        @method("DELETE")
        @csrf
        <button type="submit" class="btn btn-danger">Delete article</button>
    </form>
    </div>
  </div>
</div>
<h4>Comments</h4>
@if(session('res'))
  <div class="aleart">Ваш комментарий добавлен и отправлен на модерацию</div>
@endif
<form action="/comment"  method="post">
    @csrf
    <input type="hidden" name="article_id" value="{{$article->id}}">
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
    <!-- <small id="text" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputText1">Descriprion</label>
    <input type="text" class="form-control" id="exampleInputDesc" name="text">
  </div>
  <div class="form-group form-check">
  </div>
  <button type="submit" class="btn btn-primary">Create comment</button>
</form>

@foreach($comments as $comment)
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{$comment->title}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{$comment->text}}</h6>
    @can('comment', $comment)
    <div class="btn-toolbar">
    <a href="/comment/{{$comment->id}}/edit" class="btn btn-primary mr-3">Edit comment</a>
    <form action="/comment/{{$comment->id}}" method="post">
        @method("DELETE")
        @csrf
        <button type="submit" class="btn btn-danger">Delete comment</button>
    </form>
    </div>
    @endcan
  </div>
</div>
@endforeach
@endsection