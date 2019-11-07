@extends('layouts.app')

@section('content')
<form action="{{route('posts.update', ['post' => $post->id])}}" method="POST">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="title">Título</label>
        <input type="text" name="title" class="form-control" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description"  class="form-control" cols="30" rows="10" >{{$post->description}}</textarea>
        </div>

        <button type="submit" class="btn btn-lg btn-success">Atualizar Post</button>
    </form>
    <hr>
    <form action="{{route('posts.destroy', ['post' => $post->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-lg btn-danger" type="submit">Remover Post</button>
    </form>

@endsection
