<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

// query sem usar Eloquent
// use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Exemplo de query sem usar Eloquent
        // $post = DB::select('SELECT * FROM posts');

        // Exemplo de condição na busca
        // $posts = Post::where('title', 'Post One')->get();

        // Exemplo de limite na busca (parametro de take() será a qtde limitada)
        // $posts = Post::orderBy('title', 'asc')->take(1)->get();

        // Exemplo de ordenação
        // $posts = Post::orderBy('title', 'asc')->get();

        // Exemplo de paginação (parametro de paginate() será a qtde por pagina)
        $posts = Post::orderBy('title', 'asc')->paginate(10);

        // $posts = Post::all(); // buscar todos

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show')->with('post', $post);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
