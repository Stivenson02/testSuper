@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{ url('/product') }}">
                            <button type="button" class="btn btn-primary">Productos</button>
                        </a>
                        <a href="{{ url('/inventory') }}">
                            <button type="button" class="btn btn-primary">Inventario</button>
                        </a>
                        @if( Auth::user()->type == 0)
                            <a href="{{ url('/sale') }}">
                                <button type="button" class="btn btn-primary">Compras</button>
                            </a>
                        @endif
                    </div>

                    <p>
                       <strong>- Asegurate de correr los seeders</strong> <br>
                       <strong>- Los usuarios de Tipo 1 son Proveedores ellos pueden agregar Lotes a los productos</strong> </br>
                       <strong>- Los usuarios de Tipo 0 son clientes ellos pueden comprar y ver el carrito de compras</strong> </br>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
