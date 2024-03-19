@extends('layout')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Name</th>
      <th scope="col">Desc</th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
    <tr>
      <th scope="row">{{$article->date}}</th>
      <td><a href="/article/{{$article->id}}">{{$article->name}}</a></td>
      <td>{{$article->desc}}</td>
      <!-- <td><a href="/full-img/{{$article->full_image}}"><img src="{{URL::asset($article->preview_image)}}" width = 450 height = 300 alt=""></a></td> -->
    </tr>
    @endforeach
  </tbody>
</table>
{{$articles->links()}}
@endsection