<?php

namespace App\Repositories;

use App\Models\Pedidos;
use App\Repositories\BaseRepository;

/**
 * Class PedidosRepository
 * @package App\Repositories
 * @version July 9, 2019, 1:19 pm UTC
*/

class PedidosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pedidos::class;
    }
}
