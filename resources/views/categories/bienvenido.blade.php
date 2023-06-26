@extends ('layouts.base')
@section('titulo',"")

@section('contenido')

    <div class="d-flex justify-content-center align-items-center mt-3">
        <h1 class="text-center">
            Catalogo 
        </h1>
        
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            @auth
            <h3 class="text-center pt-5 mb-5">
                Bienvenido {{ Auth::user()->name }}
            </h3>
            @else
            <div class="col-sm-3 d-flex justify-content-center align-items-center">
                <a href="{{ route('login') }}" class="btn btn-primary">Iniciar sesion</a>
            </div>        
            @endauth
        </div>
    </div>
@endsection