<div class="card mt-2">
    <div class="card-header">
        <h1>{{$post->titulo}}</h1>
    </div>
    <div class="card-body">
        {!! $post->contenido !!}
    </div>
    <div class="card-footer">
        {{$post->autor->name. " - ".$post->created_at}}
    </div>
</div>
