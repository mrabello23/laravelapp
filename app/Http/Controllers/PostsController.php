<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

// query sem usar Eloquent
// use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

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
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

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
        $this->validate($request, ['title' => 'required', 'body' => 'required']);

        // Create Post (use tinker)
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        // Get User Id from Authentication
        $post->user_id = auth()->user()->id;
        $post->save();

        // Redirect and Set success message
        return redirect('/posts')->with('success', 'Post Created');
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
        $post = Post::find($id);

        // Check for correct user
        if (auth()->user()-> !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized page');
        }

        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, ['title' => 'required', 'body' => 'required']);

        // Create Post (use tinker)
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        // Redirect and Set success message
        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // Check for correct user
        if (auth()->user()-> !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized page');
        }

        $post->delete();

        // Redirect and Set success message
        return redirect('/posts')->with('success', 'Post Removed');
    }
}
