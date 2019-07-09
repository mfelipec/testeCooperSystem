<!-- Id Field -->
<div class="row">
    <div class="col-xs-8">
        {!! Form::label('id', 'Id:') !!}
        <p>{!! $produtos->id !!}</p>
    </div>
</div>

<div class="form-group">
    <label>Nome</label>
    <p>{!! $produtos->nome !!}</p>
</div>

<div class="form-group">
    <label>Valor</label>
    <p>{!! $produtos->valor !!}</p>
</div>

<div class="form-group">
    <label>Quantidade</label>
    <p>{!! $produtos->quantidade !!}</p>
</div>

<div class="form-group">
    <label>Situação</label>
    <p>{!! $produtos->f_situacao !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:') !!}
    <p>{!! $produtos->data_criacao !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Atualiado em:') !!}
    <p>{!! $produtos->data_atualizacao !!}</p>
</div>

