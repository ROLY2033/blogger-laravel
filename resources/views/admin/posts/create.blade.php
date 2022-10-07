@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Post</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true ]) !!}
                {!! Form::hidden('user_id', auth()->user()->id) !!}
                <div class="form-group">
                    {!! Form::label('name', 'nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control' , 'placeholder' =>  'ingrese el nombre del post']) !!}
                    @error('name')
                        <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'nombre') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control' , 'placeholder' =>  'ingrese el slug del post', 'readonly']) !!}
                    @error('slug')
                        <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    {!! Form::label('category_id', 'Categoria') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                    @error('category_id')
                         <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                   <p class="font-weight-bold">Etiquetas</p>
                   @foreach ($tags as $tag)
                        <label class="mr-2">
                            {!! Form::checkbox('tags[]', $tag->id, null) !!}
                            {{$tag->name}}
                        </label>
                   @endforeach
                   @error('tags')
                        <br>
                        <span class="text-danger"> {{$message}}</span>
                   @enderror
                </div>
                
                <div class="form-group">
                    <p class="font-weight-bold">Estado</p>
                    <label>
                        {!! Form::radio('status', 1, true ) !!}
                        Borrador
                    </label>
                    <label>
                        {!! Form::radio('status', 2, true ) !!}
                        Publicado
                    </label>
                    @error('status')
                          <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="row mb-4">
                        <div class="col">
                            <img id="picture" class="w-50" src="https://developers.google.com/site-assets/images/home/developers-social-media.png" alt="">
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('file', 'imagen mostrada en el post' ) !!}
                                {!! Form::file('file', ['class' => 'form-control-file' , 'accept' => 'image/*']) !!}
                                @error('file')
                                        <span class="text-danger"> {{$message}}</span>
                                @enderror
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt, error ipsa molestias, nam soluta officia fuga beatae officiis, enim necessitatibus cum assumenda sint illo tempora optio facere ratione ex. Rem.</p>
                                
                            </div>
                          
                        </div>
                </div>
                <div class="form-group">
                     {!! Form::label('extract', 'extracto') !!}
                     {!! Form::textarea('extract', null,['class'=>'form-control']) !!}
                     @error('extract')
                         <span class="text-danger"> {{$message}}</span>
                     @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('body', 'cuerpo del post') !!}
                    {!! Form::textarea('body', null,['class'=>'form-control']) !!}
                    @error('body')
                        <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
                
             
                {!! Form::submit('Crear Post', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
@stop
    
@section('js')
        <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>

        <script>
            $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
            });
            ClassicEditor
            .create( document.querySelector( '#extract') )
            .catch( error => {
                console.error( error );
            } );
            ClassicEditor
            .create( document.querySelector( '#body') )
            .catch( error => {
                console.error( error );
            } );

            document.getElementById("file").addEventListener('change' , cambiarImagen);
            function cambiarImagen(event) {
                var file = event.target.files[0];
                var reader = new FileReader();
                reader.onload = (event) =>{
                    document.getElementById("picture").setAttribute('src', event.target.result)
                }
                reader.readAsDataURL(file);
            }
            
        </script>
    
@endsection