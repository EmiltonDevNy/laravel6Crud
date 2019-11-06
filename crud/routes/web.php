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

Route::get('/home', 'HomeController@index')->name('home');
