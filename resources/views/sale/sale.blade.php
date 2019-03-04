@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">COMPRAR</div>
                    <div class="panel-body">
                        <div class="col-md-12 ">
                            <h3 class="item_name">{{$product->pr_name }}</h3>
                            <p class="single-price-text">
                                <strong>precio</strong> {{$product->pr_price }} <br>
                                <strong>cantidad</strong> {{$product->inventory['in_quantity'] }} <br>
                            </p>
                        </div>
                        <form class="form-horizontal" method="POST" action="{{url('sale')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{$product->id}}" name="id_product">
                            <input type="hidden" value="{{$product->inventory['in_quantity']}}" name="inventary">
                            <div class="form-group">
                                <label for="coste" class="col-md-4 control-label">Cantidad</label>
                                <div class="col-md-6">
                                    <input  type="number" class="form-control" name="quantity"  required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Agregar al carrito
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
