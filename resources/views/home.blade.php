@extends('layouts.app')

@section('content')
    <div class="container" style="display: flex; flex-flow: row wrap; justify-content: center;">
        <div class="col-xs-5">
            <a href="{!! route('produtos.index') !!}" class="btn btn-block btn-primary btn-lg">Produtos</a>
            <a href="{!! route('pedidos.index') !!}" class="btn btn-block btn-primary btn-lg">Pedidos</a>
        </div>
    </div>
@endsection
