@csrf

<div class="form-group">
    <label for="status">Produto:</label>
    <select
        id="product"
        class="form-control {{ $errors->has('product_id') ? 'is-invalid' : '' }}"
        name="product"
    >
        @foreach($products as $product)
        <option
            value="{{ $product->id }}"
            data-value="{{ $product->value }}"
            data-quantity="{{ $product->quantity }}"
            {{ old('product_id') == $product->id ? 'selected' : '' }}
        >{{ $product->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('product', '<label class="error">:message</label>') !!}
</div>

<div class="form-group">
    <label for="quantity">Quantidade:</label>
    <input
        type="number"
        id="quantity"
        name="quantity"
        step="1"
        min="1"
        class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}"
        value="{{ old('quantity') ?: @$order->quantity }}"
    />
    {!! $errors->first('quantity', '<label class="error">:message</label>') !!}
</div>

<div class="form-group">
    <label for="value">Valor:</label>
    <input
        type="number"
        id="value"
        name="value"
        step="0.01"
        min="0"
        class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}"
        value="{{ old('value') ?: @$order->value }}"
        readonly
    />
    {!! $errors->first('value', '<label class="error">:message</label>') !!}
</div>

<div class="form-group">
    <label for="name">Solicitante:</label>
    <input
        type="text"
        id="customer"
        class="form-control {{ $errors->has('customer') ? 'is-invalid' : '' }}"
        name="customer"
        value="{{ old('customer') ?: @$order->customer }}"
    />
    {!! $errors->first('customer', '<label class="error">:message</label>') !!}
</div>

<div class="form-group">
    <label for="cep">CEP:</label>
    <input
        type="text"
        id="cep"
        class="form-control {{ $errors->has('cep') ? 'is-invalid' : '' }}"
        name="cep"
        value="{{ old('cep') ?: @$order->cep }}"
    />
    {!! $errors->first('cep', '<label class="error">:message</label>') !!}
</div>

<div class="form-group">
    <label for="state">UF:</label>
    <input
        type="text"
        id="state"
        class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}"
        name="state"
        value="{{ old('state') ?: @$order->state }}"
    />
    {!! $errors->first('state', '<label class="error">:message</label>') !!}
</div>

{{-- <div class="form-group">
    <label for="state">UF:</label>
    <select name="state" id="state">
        <option value="AC">Acre</option>
        <option value="AL">Alagoas</option>
        <option value="AP">Amapá</option>
        <option value="AM">Amazonas</option>
        <option value="BA">Bahia</option>
        <option value="CE">Ceará</option>
        <option value="DF">Distrito Federal</option>
        <option value="ES">Espirito Santo</option>
        <option value="GO">Goiás</option>
        <option value="MA">Maranhão</option>
        <option value="MS">Mato Grosso do Sul</option>
        <option value="MT">Mato Grosso</option>
        <option value="MG">Minas Gerais</option>
        <option value="PA">Pará</option>
        <option value="PB">Paraíba</option>
        <option value="PR">Paraná</option>
        <option value="PE">Pernambuco</option>
        <option value="PI">Piauí</option>
        <option value="RJ">Rio de Janeiro</option>
        <option value="RN">Rio Grande do Norte</option>
        <option value="RS">Rio Grande do Sul</option>
        <option value="RO">Rondônia</option>
        <option value="RR">Roraima</option>
        <option value="SC">Santa Catarina</option>
        <option value="SP">São Paulo</option>
        <option value="SE">Sergipe</option>
        <option value="TO">Tocantins</option>
    </select>
</div> --}}

<div class="form-group">
    <label for="city">Município:</label>
    <input
        type="text"
        id="city"
        class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}"
        name="city"
        value="{{ old('city') ?: @$order->city }}"
    />
    {!! $errors->first('city', '<label class="error">:message</label>') !!}
</div>

<div class="form-group">
    <label for="neighborhood">Bairro:</label>
    <input
        type="text"
        id="neighborhood"
        class="form-control {{ $errors->has('neighborhood') ? 'is-invalid' : '' }}"
        name="neighborhood"
        value="{{ old('neighborhood') ?: @$order->neighborhood }}"
    />
    {!! $errors->first('neighborhood', '<label class="error">:message</label>') !!}
</div>

<div class="form-group">
    <label for="street">Rua:</label>
    <input
        type="text"
        id="street"
        class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}"
        name="street"
        value="{{ old('street') ?: @$order->street }}"
    />
    {!! $errors->first('street', '<label class="error">:message</label>') !!}
</div>

<div class="form-group">
    <label for="number">Número:</label>
    <input
        type="text"
        id="number"
        class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}"
        name="number"
        value="{{ old('number') ?: @$order->number }}"
    />
    {!! $errors->first('number', '<label class="error">:message</label>') !!}
</div>

<div class="form-group">
    <label for="employee">Despachante:</label>
    <input
        type="text"
        id="employee"
        class="form-control {{ $errors->has('employee') ? 'is-invalid' : '' }}"
        name="employee"
        value="{{ old('employee') ?: @$order->employee }}"
    />
    {!! $errors->first('employee', '<label class="error">:message</label>') !!}
</div>

<div class="form-group">
    <label for="status">Situação:</label>
    <select
        id="exampleFormControlSelect1"
        class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}"
        name="status"
    >
      <option value="Pendente de Envio" {{ old('status') == 'Pendente de Envio' ? 'selected' : '' }}>Pendente de Envio</option>
      <option value="Enviado" {{ old('status') == 'Enviado' ? 'selected' : '' }}>Enviado</option>
      <option value="Entregue" {{ old('status') == 'Entregue' ? 'selected' : '' }}>Entregue</option>
    </select>
    {!! $errors->first('status', '<label class="error">:message</label>') !!}
</div>

<div class="row clearfix">
    <div class="col-md-12">
        <div class="form-group text-right">
            <button type="button" class="btn btn-secondary" onclick="location.href='{{ url()->previous() }}';">Cancelar</button>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>
</div>
