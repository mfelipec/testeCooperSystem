<div class="table-responsive">
    <table class="table" id="produtos-table">
        <thead>
            <tr>
                <th width="50%">Nome</th>
                <th width="20%">Quantidade</th>
                <th width="15%">Valor</th>
                <th width="15%">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($produtos as $produtos)
            <tr>
                <td>{{ $produtos->nome }}</td>
                <td>{{ $produtos->quantidade }}</td>
                <td>{{ $produtos->valor }}</td>
                <td>
                    {!! Form::open(['route' => ['produtos.destroy', $produtos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('produtos.show', [$produtos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('produtos.edit', [$produtos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
