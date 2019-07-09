<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $produtos->id !!}</p>
</div>


<div class="form-group">
    <label>Nome</label>
    {!! $produtos->nome !!}
</div>

<div class="form-group">
    <label>Valor</label>
    {!! $produtos->valor !!}
</div>

<div class="form-group">
    <label>Quantidade</label>
    {!! $produtos->quantidade !!}
</div>

<div class="form-group">
    <label>Situação</label>
    {!! $produtos->f_situacao !!}
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $produtos->data_criacao !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $produtos->data_atualizacao !!}</p>
</div>

