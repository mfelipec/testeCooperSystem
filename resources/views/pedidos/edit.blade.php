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
                   {!! Form::model($pedidos, ['route' => ['pedidos.update', $pedidos->id], 'method' => 'patch']) !!}

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
                    $("#qtd_estoque").empty().append(data.estoque);
                    $("#valor_unitario_label").empty().append(data.valor);
                    $("#valor_unitario").val(data.valor);
                }
            });
        });
    </script>
@endsection