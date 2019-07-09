<div class="col-md-12">
    <div class="box-body">
        @if(Route::current()->getName() == 'pedidos.create')
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-4">
                        <label>Produtos</label>
                        {!! Form::select('produto_id', $produtos, old('produtos')??'', ['placeholder' => 'Selecione um produto', 'class' => 'form-control', 'id' => 'produto_id']) !!}
                    </div>
                    <div class="col-xs-2">
                        <label>Quantidade em estoque</label>
                        {!! Form::label('0', '0', ['id' => 'qtd_estoque', 'class' => 'form-control']) !!}
                    </div>
                    <div class="col-xs-2">
                        <label>Quantidade</label>
                        {!! Form::number('quantidade', old('quantidade'), ['class' => 'form-control', 'id' => 'quantidade']) !!}
                    </div>
                    <div class="col-xs-2">
                        <label>Valor Unitário</label>
                        {!! Form::label('valor_unitario', '0.00', ['id' => 'valor_unitario_label', 'class' => 'form-control']) !!}
                        {{ Form::hidden('valor_unitario', old('valor_unitario'), ['id' => 'valor_unitario']) }}
                    </div>
                </div>
            </div>
        @else
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-5">
                        <label>Situação do pedido</label>
                        {!! Form::select('situacao_pedido', $situacao, old('situacao_pedido')??$pedidos->situacao_pedido, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-4">
                        <label>Produtos</label>
                        {!! Form::select('produto_id', $produtos, old('produtos')??$pedidos->produto_id, ['placeholder' => 'Selecione um produto', 'class' => 'form-control', 'id' => 'produto_id']) !!}
                    </div>
                    <div class="col-xs-2">
                        <label>Quantidade em estoque</label>
                        {!! Form::label('qtd_estoque', $pedidos->produtos->quantidade, ['id' => 'qtd_estoque', 'class' => 'form-control']) !!}
                    </div>
                    <div class="col-xs-2">
                        <label>Quantidade</label>
                        {!! Form::number('quantidade', old('quantidade'), ['class' => 'form-control', 'id' => 'quantidade']) !!}
                    </div>
                    <div class="col-xs-2">
                        <label>Valor Unitário</label>
                        {!! Form::label('valor_unitario', $pedidos->produtos->valor, ['id' => 'valor_unitario', 'class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        @endif

        <div class="form-group">
            <div class="row">
                <div class="col-xs-12">
                    <label>Solicitante</label>
                    {!! Form::text('solicitante', old('solicitante'), ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xs-2">
                    <label>CEP</label>
                    {!! Form::text('cep', old('cep'), ['class' => 'form-control']) !!}
                </div>
                <div class="col-xs-2">
                    <label>UF</label>
                    {!! Form::text('uf', old('uf'), ['class' => 'form-control']) !!}
                </div>
                <div class="col-xs-2">
                    <label>Municipio</label>
                    {!! Form::text('municipio', old('municipio'), ['class' => 'form-control']) !!}
                </div>
                <div class="col-xs-4">
                    <label>Bairro</label>
                    {!! Form::text('bairro', old('bairro'), ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xs-8">
                    <label>Rua</label>
                    {!! Form::text('rua', old('rua'), ['class' => 'form-control']) !!}
                </div>
                <div class="col-xs-4">
                    <label>Número</label>
                    {!! Form::text('numero', old('numero'), ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xs-12">
                    <label>Despachante</label>
                    {!! Form::text('despachante', old('despachante'), ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <!-- Submit Field -->
        <div class="form-group">
            <div class="row">
                <div class="col-xs-12">
                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                    <a href="{!! route('pedidos.index') !!}" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>