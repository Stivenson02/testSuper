@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">INVENTARIO</div>
                    <div class="panel-body">
                        @foreach($inventory as $inv)
                            <div class="col-md-8 ">
                                <h3 class="item_name">{{$inv->product->pr_name}}</h3>
                                <p class="single-price-text">
                                    <strong>precio</strong> $ {{$inv->product->pr_price}} <br>
                                    <strong>cantidad</strong> {{$inv->in_quantity}} <br>
                                    <strong>lote</strong> {{$inv->product->logLote['lote']}} <br>
                                    <strong>fecha de vencimiento</strong> {{$inv->product->logLote['pr_expiration_date']}} <br>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
