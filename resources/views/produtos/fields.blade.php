<div class="form-group col-sm-12    ">
    <label>Nome</label>
    @if(Route::current()->getName() == 'produtos.edit')
        <br>{!! $produtos->nome !!}
    @else
        {!! Form::text('nome', old('nome'), ['class' => 'form-control']) !!}
    @endif
</div>

<div class="form-group col-sm-12">
    <label>Valor</label>
    {!! Form::number('valor', old('valor'), ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    <label>Quantidade</label>
    {!! Form::number('quantidade', old('quantidade'), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('produtos.index') !!}" class="btn btn-default">Cancel</a>
</div>
