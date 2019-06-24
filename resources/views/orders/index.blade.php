@extends('layouts.default')

@section('title', 'Pedidos')

@section('content')
<div class="row">


    <div class="col-sm-12">

        @include('components.notification')

        <a href="{{ route('orders.create') }}" class="btn btn-warning" style="float:right">Cadastrar Novo</a>

        <h2>Pedidos</h2>

        @if(count($orders))
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Produto</td>
                    <td>Quantidade</td>
                    <td>Valor</td>
                    <td>Solicitante</td>
                    <td>CEP</td>
                    <td>UF</td>
                    <td>Município</td>
                    <td>Endereço</td>
                    <td>Despachante</td>
                    <td>Situação</td>
                    <td>Data</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)

                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>R$ {{ $order->value }}</td>
                    <td>{{ $order->customer }}</td>
                    <td>{{ $order->cep }}</td>
                    <td>{{ $order->state }}</td>
                    <td>{{ $order->city }}</td>
                    <td>
                        {{ $order->street }}<br>
                        {{ $order->neighborhood }}<br>
                        {{ $order->number }}
                    </td>
                    <td>{{ $order->employee }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ date("d/m/Y H:i", strtotime($order->created_at) ) }}</td>
                    <td>
                        <a
                            href="{{ url("orders/$order->id/edit") }}"
                            title="Editar"
                            class="btn btn-info btn-sm"
                        ><i class="fas fa-edit"></i></a>
                        <form style="float:right" action="{{ url('orders/'.$order->id) }}" method="POST">
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
        @else
        <p class="text-center alert alert-info">Nenhum pedido cadastrado</p>
        @endif
    </div>
</div>
@endsection
