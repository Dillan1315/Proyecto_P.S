@extends('layouts.base')
@section('titulo',"Editar un nuevo proyecto")


@section('contenido')

<form action="{{ route('categories.update',['category'=>$category->id])}}" method="POST" class="pt-5">
    @csrf
	@method('put')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $category->nombre }}">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripciion</label>
        <textarea  class="form-control" id="descripcion" name="descripcion">{{ $category->descripcion }}</textarea>
		<input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
    </div>
    
    <div class="row">
        <div class="col-sm-12 justify-content-start">
            <button type="submit" class="btn btn-success">Actualizar</button>
             <a href="{{ route('categories.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
</form>

@endsection