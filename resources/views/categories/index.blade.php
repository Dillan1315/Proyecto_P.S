@extends('layouts.base')
@section('contenido')

    <div class="d-flex justify-content-center align-items-center pt-5 pb-5">
        <h1 class="text-center" style="color: rgb(7, 7, 7);">CATEGORIAS</h1>
    </div>
    <div>
        <div class="row d-flex justify-content-center mb-2">
            <div class="col-sm-10 d-flex">
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Nuevo proyecto</a>
            </div>
        </div>
        <div class="rowd-flexjustify-content-center">
            @foreach ($categories as $category)
            <div class="col-sm-10">
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5>{{ $category->nombre }}</h5>
                        <p>{{ $category->descripcion }}</p>
                    </div>
                    <div class="card-footer d-flex" style="background-color:black;">
                        <a class="btn btn-warning" href="{{ route('categories.show',['category' => $category->id]) }}"  >Detalle</a>
                        <a>-</a>
                        <a class="btn btn-success" href="{{ route('categories.edit',['category' => $category->id]) }}"   >Editar</a>
                        <a>-</a>
                        <a class="btn btn-danger" href="{{ route('categories.delete',['category' => $category->id]) }}"  >Eliminar</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection