@csrf

<div class="form-group">
    <label for="name">Nome:</label>
    <input
        type="text"
        id="name"
        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
        name="name"
        value="{{ old('name') ?: @$product->name }}"
    />
    {!! $errors->first('name', '<label class="error">:message</label>') !!}
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
        value="{{ old('value') ?: @$product->value }}"
    />
    {!! $errors->first('value', '<label class="error">:message</label>') !!}
</div>

<div class="form-group">
    <label for="quantity">Quantidade:</label>
    <input
        type="number"
        id="quantity"
        name="quantity"
        step="1"
        min="0"
        class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}"
        value="{{ old('quantity') ?: @$product->quantity }}"
    />
    {!! $errors->first('quantity', '<label class="error">:message</label>') !!}
</div>

<div class="row clearfix">
    <div class="col-md-12">
        <div class="form-group text-right">
            <button type="button" class="btn btn-secondary" onclick="location.href='{{ url()->previous() }}';">Cancelar</button>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>
</div>
