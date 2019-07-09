<div class="form-group  col-sm-12">
    <div class="form-group col-md-4">
        <label>Produtos</label>
        {!! Form::select('produto_id', $produtos, old('produtos'), ['placeholder' => 'Selecione um produto', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        <label>Quantidade</label>
        {!! Form::number('quantidade', old('quantidade'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        <label>Valor Unitário</label>
        {!! Form::label('valor_unitario', '0.00', ['id' => 'valor_unitario', 'class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group col-sm-12" style="padding: 0px 30px;">
    <label>Solicitante</label>
    {!! Form::text('solicitante', old('solicitante'), ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    <div class="form-group col-sm-2">
        <label>CEP</label>
        {!! Form::text('cep', old('cep'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-2">
        <label>UF</label>
        {!! Form::text('uf', old('uf'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-2">
        <label>Municipio</label>
        {!! Form::text('municipio', old('municipio'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-4">
        <label>Bairro</label>
        {!! Form::text('bairro', old('bairro'), ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group col-sm-12">
    <div class="form-group col-sm-8">
        <label>Rua</label>
        {!! Form::text('rua', old('rua'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-4">
        <label>Número</label>
        {!! Form::text('numero', old('numero'), ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group col-sm-12" style="padding: 0px 30px;">
    <label>Despachante</label>
    {!! Form::text('despachante', old('despachante'), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pedidos.index') !!}" class="btn btn-default">Cancel</a>
</div>
