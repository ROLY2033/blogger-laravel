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