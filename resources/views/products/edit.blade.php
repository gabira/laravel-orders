@extends('layouts.default')

@section('title', 'Produtos - Editar')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h2 class="text-center">Editar produto</h2>

        <form action="{{ url("products/$product->id") }}" method="POST">
            @method('PUT')
            @include("products.form")
        </form>
    </div>
</div>
@endsection
