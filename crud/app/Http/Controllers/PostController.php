<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->orderBy('id', 'DESC')->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            // $post = $this->post;
            // $post->title = $data['title'];
            // $post->description = $data['description'];
            $post = $this->post->create($data);

            flash('Post Criado com sucesso!')->success();
        } catch (\Exception $_ENV) {
            if (env('APP_DEBUG')) {
                flash($e->getMessage())->warning();
                return redirect()->back();
            }
            flash('Postagem não foi criada com sucesso')->warning();
            return redirect()->back();
        }

    }


    public function show($id)
    {
        try {
            $post = $this->post->findorFail($id);
            return view('posts.edit', compact('post'));
        } catch (\Exception $_ENV) {
            if (env('APP_DEBUG')) {
                flash($e->getMessage())->warning();
                return redirect()->back();
            }
            flash('Post não encontrado')->warning();
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $post = $this->post->findorFail($id);
            $post->update($data);

            flash('Post Atualizado com sucesso!')->success();
            return redirect()->route('posts.index');

        } catch (\Exception $_ENV) {
            if (env('APP_DEBUG')) {
                flash($e->getMessage())->warning();

                return redirect()->back();
            }
            flash('Post não pode ser atualizado')->warning();

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $post = $this->post->findorFail($id);
            $post->delete();
            flash('Post Removido com sucesso!')->success();

        } catch (\Exception $_ENV) {
            if(env('APP_DEBUG')){
                flash($e->getMessage())->warning();

                return redirect()->back();
            }
            flash('Post não pode ser removido')->warning();

            return redirect()->back();
        }
    }
}
