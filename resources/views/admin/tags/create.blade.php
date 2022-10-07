@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear etiqueta</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.tags.store'] ) !!}
                <div class="form-group">
                    {!! Form::label('name', 'nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control' , 'placeholder' =>  'ingrese el nombre de la etiqueta']) !!}
                    @error('name')
                        <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Slug:', ['placeholder' => 'ingrese el slug']) !!}
                    {!! Form::text('slug', null, ['class' => 'form-control' , 'placeholder' => 'slug de generado' , 'readonly']) !!}
                    @error('slug')
                        <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                        {!! Form::label('color', 'color') !!}
                        {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}
                    @error('color')
                        <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
                {!! Form::submit('Crear categoria', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>


{{-- <div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.tags.store' , 'class' => '']) !!}

            <div class="form-group">
                {!! Form::label('name','nombre',) !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ingrese el nombre de la categoria']) !!}
                
                @error('name')
                    <span class="text-danger"> {{$message}}</span>
                @enderror
                

            </div>

            <div class="form-group">
                {!! Form::label('slug','slug',) !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'ingrese el slug de la categoria', 'readonly']) !!}

                @error('slug')
                     <span class="text-danger"> {{$message}}</span>
                @enderror
            
            </div>


            {!! Form::submit('Crear categoria', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div> --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
        });
    </script>

@endsection