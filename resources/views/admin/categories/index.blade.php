@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de categoria</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
                <strong>
                    {{session('info')}}
                </strong>
        </div>
        
    @endif
   <div class="card">
        <div class="card-header">
            @can('admin.categories.create')
            <a class="btn btn-primary" href="{{route('admin.categories.create')}}">agregar categoria</a>
            @endcan
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
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td with="10px">
                                        @can('admin.categories.edit')
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit' , $category)}}">editar</a>
                                        @endcan
                                      
                                    </td>
                                    <td with="10px">
                                      @can('admin.categories.destroy')
                                      <form action="{{route('admin.categories.destroy' , $category)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">eliminar</button>
                                        </form>
                               
                                      @endcan
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
            </table>
        </div>
   </div>
@stop

