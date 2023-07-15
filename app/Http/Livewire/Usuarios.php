<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Usuarios extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    var $contador = 0;

    var $nombre;
    var $correo;
    var $password;
    var $idd;
    var $txtBoton='Crear';

    public function crear(){

        if($this->txtBoton == 'Crear'){
            $usuario=new User([
                'name' => $this->nombre,
                'email' => $this->correo,
                'password' => Hash::make($this->password)
            ]);
        }else{
            $usuario= User::findOrFail($this->idd);
            $usuario->name = $this->nombre;
            $usuario->email = $this->correo;
        }


        $usuario->save();
        session()->flash('msg', 'Usuario guardado correctamente');
    }

    public function eliminar($id){
        $usuario= User::findOrFail($id);
        $usuario->delete();
        session()->flash('msg', 'Usuario eliminado correctamente');
    }

    public function cargar($id){
        $usuario= User::findOrFail($id);
        $this->nombre = $usuario->name;
        $this->correo = $usuario->email;
        $this->txtBoton = 'Actualizar';
        $this->idd = $usuario->id;
    }

    public function sumar(){
        $this->contador+=1;
    }

    public function render()
    {
        // $usuarios=User::all();
        $usuarios=User::paginate(5);
        return view('livewire.usuarios', [
            'usuarios'=> $usuarios
        ]);
    }
}
