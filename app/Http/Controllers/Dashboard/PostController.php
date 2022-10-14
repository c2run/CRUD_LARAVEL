<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return redirect('dashboard/post/index');
        //return redirect()->route('dashboard/post/index');
        $posts = Post::paginate(1);
        return view('dashboard/post/index', compact('posts'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //user find es para encontrar datos por id y solo uno
        //para llamar todos los datos se usa método get
        //Sería el equivalente a select * from category
        //$categories = Category::get();
        $categories = Category::pluck('id', 'title');
        $post = new Post();
        //dd($categories);
        //dd($categories[0]->title);
        //con compact pasamos la variable a la vista
        echo view('dashboard.post.create', compact('categories', 'post'));
        
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //$validated = $request->validate(StoreRequest::myRules());
        //mezclar los array para no obtener error en el campo de imagen al insertar
        //la imagen. definir la imagen como vacío
        //$validated = Validator::make($request->all(), StoreRequest::myRules());
        //dd($validated->errors());
        $data = array_merge($request->all());
        //$data = $request->validated();
        //$data['slug'] = Str::slug($data['title']);
        //dd($data);
        Post::create($data); 
        //dd($data);
        return to_route("post.index");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
       echo "Página show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');
        return view('dashboard/post/edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Post $post)
    {
        //dd($request->validated());
        $post->update($request->validated());
        return to_route("post.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        echo "Página destroy";
    }
}
