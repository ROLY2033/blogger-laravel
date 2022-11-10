<div class="form-group">
    {!! Form::label('name', 'nombre') !!}
    {!! Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'ingrese nombre del rol']) !!}
    @error('name')
    <small class="text-danger">
        {{$message}}
    </small>
@enderror
</div>
<h2 class="h3">
    lista de permisos
</h2>
@foreach ($permissions as $permission)
    <div>
        <label for="">
            {!! Form::checkbox('permission[]', $permission->id, null, ['class' => 'mr-1']) !!}
            {{$permission->description}}
        </label>
  
    </div>
@endforeach
