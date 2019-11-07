@extends('layouts.app')

@section('content')
<form action="{{route('posts.store')}}" method="POST">
    @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="description" cols="30" rows="10"></textarea>
        </div>

        <button type="submit" class="btn btn-lg btn-success">Criar Post</button>
    </form>
@endsection
