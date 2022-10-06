@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mostrar lista de las etiquetas</h1>
@stop

@section('content')
   
<div class="card">
    @if (session('info'))
        <div class="alert alert-success"> <strong>{{session('info')}}</strong></div>
    @endif
    <div class="card-header">
        <a class="btn btn-primary" href="{{route('admin.tags.create')}}">agregar tag</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{$tag->id}}</td>
                                <td>{{$tag->name}}</td>
                                <td with="10px">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.tags.edit' , $tag)}}">editar</a>
                                </td>
                                <td with="10px">
                                    <form action="{{route('admin.tags.destroy' , $tag)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">eliminar</button>
                                    </form>
                                   
                                </td>
                            </tr>
                        @endforeach
                </tbody>
        </table>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

