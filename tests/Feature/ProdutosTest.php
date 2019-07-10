<?php

namespace Tests\Feature;

use App\Models\Produtos;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProdutosTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Cadastra um novo produto
     */
    public function testNovoProduto(){
        print_r("\n\nIniciando teste de Produtos\n");

        $arrProduto = [
            'nome'       => 'novo nome do produto',
            'quantidade' => 123,
            'valor'      => 1231.0
        ];

        $produto = factory(Produtos::class)->create($arrProduto);
        $this->assertEquals($arrProduto['nome'], $produto->nome, 'Nome do produto é '.$produto->nome);
    }

    /**
     * Verifica se a situacao do produto foi definida para TRUE caso a quantidade seja maior 0
     */
    public function testSituacaoTrueProduto(){
        $produto = factory(Produtos::class)->create();
        $this->assertTrue($produto->situacao, 'Situação é '.$produto->situacao);
    }

    /**
     * Verifica se a situacao do produto eh false, caso a quantidade seja 0
     */
    public function testSituacaoFalseProduto(){
        $arrProduto = [
            'nome'       => 'novo nome do produto',
            'quantidade' => 0,
            'valor'      => 1231.0
        ];

        $produto = factory(Produtos::class)->create($arrProduto);
        $this->assertFalse($produto->situacao, 'Situação é '.$produto->situacao);
    }

    /**
     * Retorna a mensagem caso o produto não seja localizado
     */
    public function testProdutoNãoLocalizado(){
        factory(Produtos::class)->create();
        $retorno = $this->call('GET', route('produtos.show', 99));
        $retorno->assertSessionHas('flash_notification.0.message', 'Produto não localizado');
    }

    /**
     * Produto não localizado ao chamar a funcao de excluir
     */
    public function testDeleteNaoLocalizado(){
        factory(Produtos::class)->create();
        $retorno = $this->call('DELETE', route('produtos.destroy', 9933));
        $retorno->assertSessionHas('flash_notification.0.message', 'Produto não localizado');
    }

    /**
     * Exclui um produto
     */
    public function testDeleteProduto(){
        $produto = factory(Produtos::class)->create();
        $retorno = $this->call('DELETE', 'produtos/destroy/'.$produto->id);
        $retorno->assertSessionHas('flash_notification.0.message', 'Produto excluído com sucesso.');
    }

    /**
     * Atualiza um produto
     */
    public function testAlterarProduto(){
        $arrProduto = [
            'id'         => 1,
            'nome'       => 'novo nome do produto',
            'quantidade' => 123,
            'valor'      => 1231.0
        ];
        factory(Produtos::class)->create();
        $retorno = $this->call('PATCH', route('produtos.update', 1), $arrProduto);
        $retorno->assertSessionHas('flash_notification.0.message', 'Produto atualizado com sucesso.');
    }
}
