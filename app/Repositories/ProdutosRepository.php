<?php

namespace App\Repositories;

use App\Models\Produtos;
use App\Repositories\BaseRepository;

/**
 * Class ProdutosRepository
 * @package App\Repositories
 * @version July 9, 2019, 12:44 am UTC
*/

class ProdutosRepository extends BaseRepository
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
        return Produtos::class;
    }
}
