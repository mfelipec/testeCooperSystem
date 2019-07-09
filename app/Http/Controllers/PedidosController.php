<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePedidosRequest;
use App\Http\Requests\UpdatePedidosRequest;
use App\Models\Pedidos;
use App\Models\Produtos;
use App\Repositories\PedidosRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProdutosRepository;
use Illuminate\Http\Request;
use Flash;
use Response;

class PedidosController extends AppBaseController
{
    /** @var  PedidosRepository */
    private $pedidosRepository;
    private $produtosRepository;

    public function __construct(PedidosRepository $pedidosRepo)
    {
        $this->pedidosRepository = $pedidosRepo;
    }

    /**
     * Display a listing of the Pedidos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pedidos = Pedidos::with('produtos')->get();

        return view('pedidos.index')
            ->with('pedidos', $pedidos);
    }

    /**
     * Show the form for creating a new Pedidos.
     *
     * @return Response
     */
    public function create()
    {
        $produtos = Produtos::pluck('nome', 'id');

        return view('pedidos.create', compact('produtos'));
    }

    /**
     * Store a newly created Pedidos in storage.
     *
     * @param CreatePedidosRequest $request
     *
     * @return Response
     */
    public function store(CreatePedidosRequest $request)
    {
        $input = $request->all();

        $pedidos = $this->pedidosRepository->create($input);

        Flash::success('Pedidos saved successfully.');

        return redirect(route('pedidos.index'));
    }

    /**
     * Display the specified Pedidos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pedidos = Pedidos::where('id', $id)->with('produtos')->first();

        if (empty($pedidos)) {
            Flash::error('Pedidos not found');

            return redirect(route('pedidos.index'));
        }

        return view('pedidos.show')->with('pedidos', $pedidos);
    }

    /**
     * Show the form for editing the specified Pedidos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pedidos = $this->pedidosRepository->find($id);

        if (empty($pedidos)) {
            Flash::error('Pedidos not found');

            return redirect(route('pedidos.index'));
        }

        return view('pedidos.edit')->with('pedidos', $pedidos);
    }

    /**
     * Update the specified Pedidos in storage.
     *
     * @param int $id
     * @param UpdatePedidosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePedidosRequest $request)
    {
        $pedidos = $this->pedidosRepository->find($id);

        if (empty($pedidos)) {
            Flash::error('Pedidos not found');

            return redirect(route('pedidos.index'));
        }

        $pedidos = $this->pedidosRepository->update($request->all(), $id);

        Flash::success('Pedidos updated successfully.');

        return redirect(route('pedidos.index'));
    }

    /**
     * Remove the specified Pedidos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pedidos = $this->pedidosRepository->find($id);

        if (empty($pedidos)) {
            Flash::error('Pedidos not found');

            return redirect(route('pedidos.index'));
        }

        $this->pedidosRepository->delete($id);

        Flash::success('Pedidos deleted successfully.');

        return redirect(route('pedidos.index'));
    }
}
