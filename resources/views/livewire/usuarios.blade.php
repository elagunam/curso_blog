<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <h1>Usuarios</h1>
    <hr>
    {{-- <button class="btn btn-dark" wire:click="sumar">{{$contador}}</button> --}}
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="crear" class="form">
                <label for="nombre">Nombre:</label>
                <input type="text" wire:model="nombre" id="nombre" class="form-control">
                <label for="nombre">Email:</label>
                <input type="email" wire:model="correo"  id="email" class="form-control">
                <label for="nombre">Contraseña:</label>
                <input type="password" wire:model="password"  id="password" class="form-control">

                <input type="submit" value="{{$txtBoton}}" class="btn btn-primary mt-2">
                @if (session('msg'))
                <div class="alert alert-success mt-2">{{session('msg')}}</div>
                @endif
            </form>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @empty($usuarios)
                                <tr colspan=4><td>SIn datos</td></tr>
                            @else
                            @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->id}}</td>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>
                                    <button class="btn btn-success" wire:click="cargar({{$usuario->id}})">Editar</button>
                                    <button class="btn btn-danger" wire:click="eliminar({{$usuario->id}})">Eliminar</button>
                                </td>
                            </tr>
                            @endforeach
                            @endempty
                        </tbody>

                    </table>
                    {{$usuarios->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
