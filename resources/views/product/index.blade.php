@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">PRODUCTOS</div>
                    <div class="panel-body">
                        @foreach($products as $product)
                            <div class="col-md-8 ">
                                <h3 class="item_name">{{$product->pr_name }}</h3>
                                <p class="single-price-text">
                                    <strong>precio</strong> {{$product->pr_price }} <br>
                                    <strong>cantidad</strong> {{$product->inventory['in_quantity'] }} <br>
                                    @if( Auth::user()->type == 1)
                                        <a href="{{ url('/product',$product->id) }}">
                                            <button type="button" class="btn btn-primary">Seleccionar</button>
                                        </a>
                                    @else
                                        <a href="{{ url('/sale', $product->id) }}">
                                            <button type="button" class="btn btn-primary">Comprar</button>
                                        </a>
                                    @endif
                                </p>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
