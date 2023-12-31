<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TemaController extends Controller
{
    public function index(){
        $temas = Tema::paginate(10);
        // $temas = Tema::all();
        return view('temas', [
            'temas' => $temas
        ]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombreTema' => ['required', 'string', 'max:255'],
        ]);
    }

    public function create(Request $request){
        $validated = $request->validate([
            'nombreTema' => 'required|string|max:255|min:4',
        ]);


        $message = 'Elemento creado correctamente';
        $clase = 'alert alert-primary';
        if(isset($request->id) && !empty($request->id)){
            $tema = Tema::find($request->id);
            $message = 'Elemento actualizado correctamente';
            $clase = 'alert alert-success';
        }else{
            $tema = new Tema();
        }

        $tema->nombreTema = $request->input('tema');
        $tema->save();

        // $tema = $_REQUEST['tema'];
        // Tema::create([
        //     'nombreTema'=>$tema
        // ]);

        return redirect('temas')->with('msg', $message)->with('clase',  $clase);
    }

    public function delete($id){
        $tema = Tema::find($id);
        $tema->delete();
        return redirect()->route(('temas'))->with('msg', 'Elemento eliminado correctamente')->with('clase', 'alert alert-danger');
    }


    public function editar($id){
        $tema = Tema::find($id);
        // $tema->delete();
        // return response($tema);
        return redirect()->route(('temas'))->with($tema->toArray());
        // ->with('id', $tema->id)->with('nombreTema', $tema->nombreTema);
    }

}
