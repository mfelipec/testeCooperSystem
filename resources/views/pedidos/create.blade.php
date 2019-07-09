@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pedidos
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'pedidos.store']) !!}

                        @include('pedidos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('select').on('change', function(){
            var idProduto = this.value;
            $.ajax({
                url: '{{ route('produtos.dados') }}',
                type: 'GET',
                data: {id: idProduto},
                success: function (data) {
                    estoque = data.estoque;
                    $("#qtd_estoque").empty().append(estoque);
                    $("#valor_unitario_label").empty().append(data.valor);
                    $("#valor_unitario").val(data.valor);

                    if(estoque < 1){
                        alert('Este produto não se encontra disponivel. Por favor, escolha outro.');
                        $('#produto_id').val('0');
                    }
                }
            });
        });

        $('#quantidade').change(function(){
            var idProduto = $("#produto_id").val();
            if(idProduto === '')
                $(this).val('0');
            else {
                $.ajax({
                    url: '{{ route('produtos.dados') }}',
                    type: 'GET',
                    data: {id: idProduto},
                    success: function (data) {
                        estoque = data.estoque;
                        quantidade = $("#quantidade").val();
                        if (quantidade > estoque){
                            alert('Esse produto possuí uma quantidade menor que a informada.');
                            $("#quantidade").val(estoque);
                        }
                    }
                });
            }
        });

    </script>
@endsection