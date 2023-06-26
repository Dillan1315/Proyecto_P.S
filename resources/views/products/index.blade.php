@extends('layouts.base')
@section('titulo', 'Productos')

@section('contenido')

    <div class="row d-flex justify-content-center mb-2">
        <div class="col-sm-10">
            <a href="{{ route('products.create') }}" class="btn btn-primary">Agregar</a>
            <a href="{{ route('landing') }}" class="btn btn-danger">Volver</a>
        </div>
    </div>
    <div>
        <div class="row d-flex mb-2">
            @foreach ($products as $product)
            <div class="col-sm-4">
                <div class="card shadow-sm">
                    <div>
                        <center>
                            <p>
                                <b style="text-transform: capitalize">Categoria: </b> {{ $product->category->nombre }}
                            </p>
                        </center>
                    </div> 
                    <div class="mt-3 mb-3 d-flex justify-content-center">
                        @if($product->imagen != null)
                        <img src="{{ $product->imagen }}" alt="" id="imagen" width="150px" height="150px">
                        @else
                        <img src="{{ asset('img/default.jpg') }}" alt="" id="imagen" width="150px" height="150px">
                        @endif
                    </div>
                    <div>
                        <center>
                            <p>
                                <b style="text-transform: capitalize">Nombre del producto: </b>{{ $product->titulo }}
                            </p>
                        </center>
                    </div>
                    <div>
                        <center>
                            <p>
                                <b style="text-transform: capitalize">Descripcion: </b>{{ $product->descripcion }}
                            </p>
                        </center>
                    </div> 
                    <div>
                        <center>
                            <p>
                                <b style="text-transform: capitalize">Marca: </b>{{ $product->marca }}
                            </p>
                        </center>
                    </div>
                    <div>
                        <center>
                            <p>
                                <b style="text-transform: capitalize">Precio: </b>{{ $product->precio }}
                            </p>
                        </center>
                    </div>
                    <div>
                        <center>
                            <p>
                                <b style="text-transform: capitalize">Tallas: </b>{{ $product->tallas }}
                            </p>
                        </center>
                    </div>
                    <div class="card-footer d-flex justify-content-center align-items-center" style="background-color: black;">>
                        <a href="{{ route('products.edit',['product'=>$product->id]) }}" class="btn btn-warning" style="margin-left: 10px">Editar</a>
                        <a href="{{ route('products.delete',['product'=>$product->id]) }}" class="btn btn-danger" style="margin-left: 10px">Eliminar</a>
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