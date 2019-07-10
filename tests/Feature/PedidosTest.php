<?php

namespace Tests\Feature;

use App\Models\Pedidos;
use App\Models\Produtos;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PedidosTest extends TestCase
{
    use DatabaseMigrations;

    public function testCriarPedido(){
        print_r("\n\nIniciando teste de Pedidos\n");

        $arrPedido = [
            'produto_id' => function(){
                return factory(\App\Models\Produtos::class)->create()->id;
            },
            'quantidade' => 1,
            'valor_unitario' => 2.3,
            'solicitante' => 'teste nome solicitante',
            'cep' => '71000000',
            'uf' => 'DF',
            'municipio' => 'Distrito Federal',
            'bairro' => 'Brasília',
            'rua' => 'Rua dos testes',
            'despachante' => 'teste nome despachante'
        ];

        $pedido = factory(Pedidos::class)->create($arrPedido);
        $this->assertEquals($arrPedido['solicitante'], $pedido->solicitante);
    }

    public function testViewPedido(){
        factory(Pedidos::class)->create();
        $retorno = $this->call('GET', route('pedidos.show', 234));
        $retorno->assertSessionHas('flash_notification.0.message', 'Pedido não localizado');
    }

    /**
     * Verifico se após o cadastro de um pedido, a quantidade existente do produto sera decrementada.
     */
    public function testQuantidadeProduto(){
        $produto = factory(Produtos::class)->create();
        $qtdOriginal = $produto->quantidade;
        $pedido = factory(Pedidos::class)->create([
            'produto_id' => $produto->id,
            'quantidade' => 5,
            'valor_unitario' => $produto->valor,
            'solicitante' => 'teste nome solicitante',
            'cep' => '71000000',
            'uf' => 'DF',
            'municipio' => 'Distrito Federal',
            'bairro' => 'Brasília',
            'rua' => 'Rua dos testes',
            'despachante' => 'teste nome despachante'
        ]);
        $qtdNova = Produtos::find($produto->id)->quantidade;

        $this->assertLessThan($qtdOriginal, $qtdNova);
    }
}
