@extends('layouts.default')

@section('title', 'Produtos')

@section('content')
<div class="row">


    <div class="col-sm-8 offset-sm-2">

        @include('components.notification')

        <a href="{{ route('products.create') }}" class="btn btn-warning" style="float:right">Cadastrar Novo</a>

        <h2>Produtos</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Nome</td>
                    <td>Valor unitário</td>
                    <td>Quantidade</td>
                    <td>Situação</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>R$ {{ $product->value }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->status }}</td>
                    <td>
                        <a
                            href="{{ url("products/$product->id/edit") }}"
                            title="Editar"
                            class="btn btn-info btn-sm"
                        ><i class="fas fa-edit"></i></a>
                        <form style="float:right" action="{{ url('products/'.$product->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="button"
                                class="btn btn-sm btn-danger"
                                title="Excluir"
                                onclick="if(confirm('Deseja mesmo remover este registro?')){ this.form.submit() }">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
