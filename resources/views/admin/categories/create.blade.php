@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear categoria</h1>
@stop

@section('content')

        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'admin.categories.store']) !!}

                    <div class="form-group">
                        {!! Form::label('name','nombre',) !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ingrese el nombre de la categoria']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('slug','slug',) !!}
                        {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'ingrese el slug de la categoria']) !!}
                    </div>


                    {!! Form::submit('Crear categoria', ['class' => 'btn btn-primary']) !!}
                    
                {!! Form::close() !!}
            </div>
        </div>
@stop

