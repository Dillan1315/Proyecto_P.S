@extends('layouts.base')
@section('titulo',"Agregar un producto")

@section('contenido')
<form action="{{ route('products.store') }}" method="POST" class="pt-5">
    @csrf

    <div class="d-flex justify-content-center">
        <input type="file" class="form-control" id="input_imagen"  style="display:none">
        <textarea name="imagen" id="imagen_texto" class="d-none"></textarea>
        <div style="border: solid 1px black">
            <img src="{{ asset('img/default.jpg') }}" alt="" id="imagen" width="150px" height="150px">
        </div>
    </div>
    <div class="mb-3">
        <label for="titulo" class="form-label">Nombre del producto</label>
        <input type="text" class="form-control" id="titulo" name="titulo">
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" name="descripcion" id="descripcion" cols="10" rows="10"></textarea>
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
    </div>
    <div class="mb-3">
        <label for="marca" class="form-label">Marca</label>
        <textarea class="form-control" name="marca" id="marca"></textarea>
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <textarea class="form-control" name="precio" id="precio"></textarea>
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
    </div>
    <div class="mb-3">
        <label for="tallas" class="form-label">Tallas</label>
        <textarea class="form-control" name="tallas" id="tallas"></textarea>
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">Categoria</label>
        <select name="category_id" id="category_id" class="form-control" required>
            <option value="">--Seleccione--</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->nombre }}</option>
            @endforeach
        </select>
    </div>
    <a href="{{ route('products.index') }}" class="btn btn-danger">Volver</a>
    <button type="submit" class="btn btn-success">Crear</button>
</form>

@endsection

@section('scripts')
<script>
    var imagen = document.getElementById('imagen');
    var input_imagen = document.getElementById('input_imagen');
    var imagen_texto = document.getElementById('imagen_texto');
    imagen.addEventListener('click',function(){
        input_imagen.click();
    });
    input_imagen.addEventListener('change',function(){
        var file = this.files[0];
        var sizebyte = this.files[0].size;
        var sizekilobyte = parseInt(sizebyte / 1024);
        if (sizekilobyte > 4) {
            alert('La imagen excede el tamaño permitido de 4 MB');
        } else {
            var reader = new FileReader();
            reader.onloadend = function() {
                document.getElementById("imagen").src = reader.result;
                document.getElementById("imagen_texto").value = reader.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection