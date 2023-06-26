@extends ('layouts.base')
@section('titulo',"Crear una nueva categoria")


@section('contenido')

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea type="text" class="form-control" id="descripcion" name="descripcion"></textarea>
        <input type="hidden" value="{{ Auth::user()->id}}" name="user_id">
    </div>
    <div class="row">
        <div class="col-sm-12 justify-content-start">
            <button type="submit" class="btn btn-success" >Guardar</button>
            <a href="{{ route('categories.index') }}" class="btn btn-danger" >Volver</a>
        </div>
    </div>
</form>
@endsection

