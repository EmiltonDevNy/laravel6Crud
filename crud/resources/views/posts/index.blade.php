@extends('layouts.app')

@section('content')
    <div class="col-12">
    <a href="{{route('posts.create')}}" class="btn btn-lg btn-success">Criar Postagem</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Criado em</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
            <tr>
            <td>{{$post->id}}</td>
            <td>
                <a href="{{route('posts.show', ['post' => $post->id])}}">
                {{$post->title}}
                </a>
            </td>
            <td>{{$post->created_at}}</td>
            </tr>
            @empty
                <tr>
                    <td colspan="3"></td>
                    <h2>Nenhum post encontrado!</h2>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{$posts->links()}}
@endsection
<script type="text/javascript" src="<?php echo asset('assets/js/jquery.js'); ?>"></script>
<script>
    $(document).ready(
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    );
</script>

