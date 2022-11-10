@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Role</h1>
@stop


@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store',  'autocomplete' => 'off']) !!}
            @include('admin.roles.partials.form')
            {!! Form::submit('crear rol', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop