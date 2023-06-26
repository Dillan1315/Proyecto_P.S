@extends('layouts.base')
@section('titulo','Eliminar un proyecto')

@section('contenido')

<div class="row text-center">
    <h3 class="col-sm-12 d-flex justify-content-center pb-5 text-danger">
        ¿Está seguro de eliminar la categoria?
    </h3>
    <form action="{{ route('categories.destroy',['category' => $category->id]) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger" style="margin-left:10px">Eliminar</button>
		<a href="{{ route('categories.index') }}" class="btn btn-success" style="margin-left:10px">Cancelar</a>
    </form>
</div>
@endsection