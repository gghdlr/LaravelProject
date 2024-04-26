@extends('layout')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">Title</th>            
            <th scope="col">Text</th>
            <th scope="col">Article</th>
            <th scope="col">User</th>
            <th scope="col">Accept/Reject</th>    
        </tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
    <tr>
      <th scope="row">{{$comment->title}}</th>
      <th scope="row">{{$comment->text}}</th>
      <td><a href="/article/{{$comment->article_id}}">{{$comment->name}}</a></td>
      <td>{{$comment->name}}</td>
      <td>
        @if($comment->accept == 'true')
          <a class="btn btn-warning" href = "comment/{{$comment->id}}/reject">Reject</a> 
          @else
          <a class="btn btn-success" href  = "comment/{{$comment->id}}/accept">Accept</a> 
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
