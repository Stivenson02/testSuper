@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">PRODUCTOS</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{url('inventory')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{$product->id}}" name="id_product">
                            <div class="form-group">
                                <label for="coste" class="col-md-4 control-label">Cantidad</label>
                                <div class="col-md-6">
                                    <input  type="number" class="form-control" name="quantity"  required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="coste" class="col-md-4 control-label">lote</label>
                                <div class="col-md-6">
                                    <input  type="number" class="form-control" name="lote"  required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="coste" class="col-md-4 control-label">Fecha de vencimiento</label>
                                <div class="col-md-6">
                                    <input  type="date" class="form-control" name="expiration"  required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
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
