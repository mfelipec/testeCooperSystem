<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProdutosRequest;
use App\Http\Requests\UpdateProdutosRequest;
use App\Models\Produtos;
use App\Repositories\ProdutosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProdutosController extends AppBaseController
{
    /** @var  ProdutosRepository */
    private $produtosRepository;

    public function __construct(ProdutosRepository $produtosRepo)
    {
        $this->produtosRepository = $produtosRepo;
    }

    /**
     * Display a listing of the Produtos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $produtos = $this->produtosRepository->all();

        return view('produtos.index')
            ->with('produtos', $produtos);
    }

    /**
     * Show the form for creating a new Produtos.
     *
     * @return Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created Produtos in storage.
     *
     * @param CreateProdutosRequest $request
     *
     * @return Response
     */
    public function store(CreateProdutosRequest $request)
    {
        $input = $request->all();

        $produtos = $this->produtosRepository->create($input);

        Flash::success('Produto salvo com sucesso.');

        return redirect(route('produtos.index'));
    }

    /**
     * Display the specified Produtos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $produtos = $this->produtosRepository->find($id);

        if (empty($produtos)) {
            Flash::error('Produto não localizado');

            return redirect(route('produtos.index'));
        }

        return view('produtos.show')->with('produtos', $produtos);
    }

    /**
     * Show the form for editing the specified Produtos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $produtos = $this->produtosRepository->find($id);

        if (empty($produtos)) {
            Flash::error('Produto não localizado');

            return redirect(route('produtos.index'));
        }

        return view('produtos.edit')->with('produtos', $produtos);
    }

    /**
     * Update the specified Produtos in storage.
     *
     * @param int $id
     * @param UpdateProdutosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProdutosRequest $request)
    {
        $produtos = $this->produtosRepository->find($id);

        if (empty($produtos)) {
            Flash::error('Produto não localizado');

            return redirect(route('produtos.index'));
        }

        $produtos = $this->produtosRepository->update($request->all(), $id);

        Flash::success('Produto atualizado com sucesso.');

        return redirect(route('produtos.index'));
    }

    /**
     * Remove the specified Produtos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $produtos = $this->produtosRepository->find($id);

        if (empty($produtos)) {
            Flash::error('Produto não localizado');

            return redirect(route('produtos.index'));
        }

        $this->produtosRepository->delete($id);

        Flash::success('Produto excluído com sucesso.');

        return redirect(route('produtos.index'));
    }

    /**
     * Busco algumas informacoes basicas referente ao produto
     * para poder verificar preço e quantidade em estoque.
     *
     * @param Request $request
     * @return array
     */
    public function getDados(Request $request){
        $idProduto = $request->id;

        $produto = Produtos::find($idProduto);
        $dados = [
            'estoque' => $produto->quantidade,
            'valor'   => $produto->valor
        ];

        return $dados;
    }
}
