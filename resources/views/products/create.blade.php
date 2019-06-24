@extends('layouts.default')

@section('title', 'Produtos - Cadastrar')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h2 class="text-center">Adicionar um produto</h2>

        <form method="POST" action="{{ route('products.store') }}">
            @include("products.form")
        </form>
    </div>
</div>
@endsection
