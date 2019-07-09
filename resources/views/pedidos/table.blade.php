<div class="table-responsive">
    <table class="table" id="pedidos-table">
        <thead>
            <tr>
                <th width="15%">Produto</th>
                <th width="5%">Quant</th>
                <th width="25%">Solicitante</th>
                <th width="10%">Data do Pedido</th>
                <th width="10%">Sit. do Pedido</th>
                <th width="25%">Despachante</th>
                <th width="10%">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pedidos as $pedidos)
            <tr>
                <td>{!! $pedidos->produtos->nome !!}</td>
                <td>{!! $pedidos->quantidade !!}</td>
                <td>{!! $pedidos->solicitante !!}</td>
                <td>{!! $pedidos->data_criacao !!}</td>
                <td>{!! $pedidos->situacao !!}</td>
                <td>{!! $pedidos->despachante !!}</td>
                <td>
                    {!! Form::open(['route' => ['pedidos.destroy', $pedidos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('pedidos.show', [$pedidos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('pedidos.edit', [$pedidos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
