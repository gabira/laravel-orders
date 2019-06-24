@extends('layouts.default')

@section('title', 'Pedidos - Cadastrar')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h2 class="text-center">Cadastrar um pedido</h2>

        <form method="POST" action="{{ route('orders.store') }}">
            @include("orders.form")
        </form>
    </div>
</div>
@endsection
