<?php

use \App\{Post, Postimage};

Route::get('/', function () {
    return view('welcome');
});


Route::get('sub', function () {
    $posts = Post::addSelect([
        'thumb' => PostImage::select('image')->whereColumn('post_id', 'posts.id')->limit(1)
    ])->get();

    return $posts;

});

Auth::routes();

Route::get('lazy-colections', function (){
    $posts = Post::cursor();
    dd($posts);
    foreach ($posts as $post) {
        print $post->title . '<br>';
    }
});

Route::get('/home', 'HomeController@index')->name('home');
