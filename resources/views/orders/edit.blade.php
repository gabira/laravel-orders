@extends('layouts.default')

@section('title', 'Pedidos - Editar')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h2 class="text-center">Editar pedido</h2>

        <form action="{{ url("orders/$order->id") }}" method="POST">
            @method('PUT')
            @include("orders.form")
        </form>
    </div>
</div>
@endsection
