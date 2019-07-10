<div class="col-md-12">
    <div class="box-body">
        <!-- Id Field -->
        <div class="form-group">
            <div class="row">
                <div class="col-xs-2">
                    {!! Form::label('id', 'Id:') !!}
                    <p>{!! $pedidos->id !!}</p>
                </div>

                <div class="col-xs-5">
                    <label>Situação do pedido</label>
                    <p>{!! $pedidos->situacao !!}</p>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-6">
                <label>Produtos</label>
                <p>{!! $pedidos->produtos->nome !!}</p>
            </div>
            <div class="col-xs-3">
                <label>Quantidade</label>
                <p>{!! $pedidos->quantidade !!}</p>
            </div>
            <div class="col-xs-3">
                <label>Valor Unitário</label>
                <p>{!! $pedidos->valor_unitario !!}</p>
            </div>
        </div>

        <div class="form-group">
            <label>Solicitante</label>
            <p>{!! $pedidos->solicitante !!}</p>
        </div>

        <div class="row">
            <div class="col-xs-2">
                <label>CEP</label>
                <p>{!! $pedidos->cep !!}</p>
            </div>
            <div class="col-xs-2">
                <label>UF</label>
                <p>{!! $pedidos->uf !!}</p>
            </div>
            <div class="col-xs-4">
                <label>Municipio</label>
                <p>{!! $pedidos->municipio !!}</p>
            </div>
            <div class="col-xs-4">
                <label>Bairro</label>
                <p>{!! $pedidos->bairro !!}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-8">
                <label>Rua</label>
                <p>{!! $pedidos->rua !!}</p>
            </div>
            <div class="col-xs-4">
                <label>Número</label>
                <p>{!! $pedidos->numero !!}</p>
            </div>
        </div>

        <div class="form-group">
            <label>Despachante</label>
            <p>{!! $pedidos->despachante !!}</p>
        </div>

        <!-- Created At Field -->
        <div class="form-group">
            {!! Form::label('created_at', 'Data do pedido:') !!}
            <p>{!! $pedidos->data_hora_criacao !!}</p>
        </div>

        <!-- Updated At Field -->
        <div class="form-group">
            {!! Form::label('updated_at', 'Ultima atualização do pedido:') !!}
            <p>{!! $pedidos->data_atualizacao !!}</p>
        </div>
    </div>
</div>