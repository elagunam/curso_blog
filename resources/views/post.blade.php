@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('posts') }}" method="POST" class="form">
        @csrf
        @if (session('id'))
            <input type="hidden" name="id" value="{{session('id')}}">
        @endif
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <label for="titulo">Titulo: </label>
                    <input type="text" name="titulo" id="titulo" class="form-control" value="{{session('titulo') ? session('titulo') : null}}">
                </div>
                <div class="row mt-2">
                    <label for="contenido">Contenido: </label>
                    <textarea name="contenido" id="contenido" cols="30" rows="10" class="form-control">{{session('titulo') ? session('titulo') : null}}</textarea>
                </div>

                <div class="row mt-2">
                    <div class="col-md-4">
                        <input type="submit" value="{{session('id') ? 'Actualizar' : 'Crear'}}" class="btn btn-dark mt-4">
                    </div>
                </div>
            </div>
        </div>
    </form>
    @if (session('msg'))
    <div class="{{session('clase')}} mt-2 mb-2" role="alert">
        {{session('msg')}}
    </div>
    @endif

    <div class="card mt-2">
        <div class="card-body">
            @if (!empty($posts))
            <div class="table-responsive">
                {{-- <table class="table table-striped">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">#</th>
                            <th scope="col">Nombre del tema</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                            @foreach ($temas as $key=>$tema)
                            <tr class="">
                                <td scope="row">{{$key*1+1}}</td>
                                <td>{{$tema->nombreTema}}</td>
                                <td>
                                    <a href="{{ route('deleteTema',$tema->id) }}"  class="btn btn-danger">Eliminar</a>

                                    <a href="{{ route('editarTema',$tema->id) }}"  class="btn btn-primary">Editar</a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table> --}}
                {{$posts->links()}}
            </div>
            @else
            <div class="p-3 mb-2 bg-danger text-white">Nada para mostrar</div>
            @endif

        </div>
    </div>
</div>
@endsection
