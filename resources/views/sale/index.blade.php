@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">CARRITO</div>
                    <div class="panel-body">
                        @foreach($sales as $sale)
                            <div class="col-md-8 ">
                                <h3 class="item_name">{{$sale->product->pr_name }}</h3>
                                <p class="single-price-text">
                                    <strong>precio</strong> {{$sale->product->pr_price * $sale->sl_quantity }} <br>
                                    <strong>cantidad</strong> {{$sale->sl_quantity }} <br>
                                    <a href="{{ url('/inventory',$sale->id) }}">
                                        <button type="button" class="btn btn-primary">Quitar</button>
                                    </a>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
