@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Role</h1>
@stop

@if (session('info'))
    <div class="alert alert-success"> <strong>{{session('info')}}</strong></div>
@endif


@section('content')


    <div class="card">
        <div class="card-body">
            {!! Form::model(['route' => ['admin.roles.update'] , 'method' => 'put']) !!}
            @include('admin.roles.partials.form')
            {!! Form::submit('actualizar rol', ['class' => 'btn btn-primary']) !!}
            
            {!! Form::close() !!}
        </div>
    </div>
    <h1>Editar Role</h1>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
