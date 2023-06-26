@extends('layouts.base')
@section('titulo',"Editar Producto")

@section('contenido')

<form action="{{ route('products.update',['product'=>$product->id]) }}" method="POST">
    @csrf
    @method('put')
    <div class="mt-3 mb-3 d-flex justify-content-center">
        @if($product->imagen != null)
        <img src="{{ $product->imagen }}" alt="" id="imagen" width="150px" height="150px">
        @else
        <img src="{{ asset('img/default.jpg') }}" alt="" id="imagen" width="150px" height="150px">
        @endif
    </div>
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $product->titulo }}">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" name="descripcion" id="descripcion" cols="10" rows="10">{{ $product->descripcion }}</textarea>
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
    </div>
    <div class="mb-3">
        <label for="marca" class="form-label">Marca</label>
        <textarea class="form-control" name="marca" id="marca">{{ $product->marca }}</textarea>
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <textarea class="form-control" name="precio" id="precio" >{{ $product->precio }}</textarea>
        
    </div>
    <div class="mb-3">
        <label for="tallas" class="form-label">Tallas</label>
        <textarea class="form-control" name="tallas" id="tallas" >{{ $product->tallas }}</textarea>
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">Categoria</label>
        <select name="category_id" id="category_id" class="form-control" required>
            @foreach ($categories as $category)
                @if($product->category_id == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->nombre }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('products.index') }}" class="btn btn-danger">Cancelar</a>
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
            if (sizekilobyte > 4096) {
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