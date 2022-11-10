@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<a class="btn btn-secondary bt-sm float-right"  href="{{ route('admin.roles.create') }}">crear rol</a>
  
    <h1>List de Roles</h1>
@stop

@section('content')
  
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Role</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td class="w-25"><a class="btn btn-primary" href="{{route('admin.roles.edit', $role)}}">editar</a></td>
                            <td class="w-25">
                                <form action="{{route('admin.roles.destroy', $role)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

