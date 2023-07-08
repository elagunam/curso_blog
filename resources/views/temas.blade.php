@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('temas') }}" method="POST" class="form">
        @csrf
        @if (session('id'))
            <input type="hidden" name="id" value="{{session('id')}}">
        @endif
        <div class="card">
            <div class="card-body">
                <label for="tema">Tema: </label>
                <input type="text" name="tema" id="tema" class="form-control" value="{{session('nombreTema') ? session('nombreTema') : null}}">
                <input type="submit" value="{{session('id') ? 'Actualizar' : 'Crear'}}" class="btn btn-dark mt-4">
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
            @if (!empty($temas))
            <div class="table-responsive">
                <table class="table table-striped">
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
                                    {{-- href="temas/delete/{{$tema->id}}" --}}
                                    <a href="{{ route('deleteTema',$tema->id) }}"  class="btn btn-danger">Eliminar</a>

                                    <a href="{{ route('editarTema',$tema->id) }}"  class="btn btn-primary">Editar</a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                {{$temas->links()}}
            </div>
            @else
            <div class="p-3 mb-2 bg-danger text-white">Nada para mostrar</div>
            @endif

        </div>
    </div>
</div>
@endsection
