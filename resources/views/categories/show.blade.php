@extends('layouts.base')

@section('contenido')

	<div>
		<div class="row d-flex justify-content-center mb-2">
			<div class="col-sm-10">
				<a href="{{ route('categories.index') }}" class="btn btn-danger" style="margin-left:10px" >Volver</a>
				<a href="{{ route('products.create') }}" class="btn btn-success" style="margin-left:10px">Agregar</a>
			</div>
    	</div>	
	</div>
    <div class="d-flex justify-content-center align-items-center pt-5 pb-5">
        <div class="text-center">
            <h1>{{ $category->nombre }}</h1>
        </div>
    </div>
    <div>
        <div class="row d-flex mb-2">
            @foreach ($products as $product)
            <div class="col-sm-4">
                <div class="card shadow-sm" >
                    <div>
                        <p >
                            <center>  
                                @if($product->imagen != null)
                                <img src="{{ $product->imagen }}" alt="" id="imagen" width="150px" height="150px">
                                @else
                                <img src="{{ asset('img/default.jpg') }}" alt="" id="imagen" width="150px" height="150px">
                                @endif
                            </center>
                        </p>
                    </div>
                    <div >
                        <center>
                        <p>
                            <b style="text-transform: capitalize">Nombre: </b> {{ $product->titulo }}</p>
                        <p>
                            <b style="text-transform: capitalize">Descripcion: </b> {{ $product->descripcion }}
                        </p>
                        <p>
                            <b style="text-transform: capitalize">Precio: </b> {{ $product->precio }}
                        </p>
                        <p style="text-transform: uppercase;">
                            <b style="text-transform: capitalize">Tallas Disponibles: </b> {{ $product->tallas }}
                        </center>
                    </div>
                <div class="card-footer d-flex justify-content-center align-items-center" style="background-color: black;">
                    <a class="btn btn-success" href="{{ route('products.edit',['product'=>$product->id]) }}" style="margin-left:10px">Editar</a>
                    <a class="btn btn-danger" href="{{ route('products.delete',['product'=>$product->id]) }}" style="margin-left:10px">Eliminar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
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