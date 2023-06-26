@extends('layouts.base')
@section('titulo','Eliminar un producto')

@section('contenido')

<div class="row text-center">
    <h3 class="col-sm-12 d-flex justify-content-center pb-5 text-danger">
        ¿Está seguro de eliminar el producto?
    </h3>
    <form action="{{ route('products.destroy',['product' => $product->id]) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger" style="margin-left:10px">Eliminar</button>
		<a href="{{ route('products.index') }}" class="btn btn-success" style="margin-left:10px">Cancelar</a>
    </form>
</div>
@endsection
