<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::paginate(10);
        $temas = Tema::all();
        return view('post', [
            'posts' => $posts,
            'temas' => $temas
        ]);
    }

    public function create(Request $request){
        $message = 'Elemento creado correctamente';
        $clase = 'alert alert-primary';
        if(isset($request->id) && !empty($request->id)){
            $post = Post::find($request->id);
            $message = 'Elemento actualizado correctamente';
            $clase = 'alert alert-success';
        }else{
            $post = new Post();
        }
        $post->titulo = $request->input('titulo');
        $post->contenido = $request->input('contenido');
        $post->id_tema = $request->input('id_tema');
        $post->id_autor = Auth::user()->id;
        $post->save();
        return redirect('posts')->with('msg', $message)->with('clase',  $clase);
    }

    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route(('posts'))->with('msg', 'Elemento eliminado correctamente')->with('clase', 'alert alert-danger');
    }


    public function editar($id){
        $post = Post::find($id);
        return redirect()->route(('posts'))->with($post->toArray());
    }

}
