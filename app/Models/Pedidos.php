<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * Class Pedidos
 * @package App\Models
 * @version July 9, 2019, 1:05 pm UTC
 *
 */
class Pedidos extends Model
{
    use SoftDeletes;

    public $table = 'pedidos';
    protected $primaryKey = 'id';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'produto_id',
        'quantidade',
        'valor_unitario',
        'solicitante',
        'cep',
        'uf',
        'municipio',
        'bairro',
        'rua',
        'despachante'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     *
     *
     */
    public static $rules = [
        'produto_id'  => 'required',
        'quantidade'  => 'required|min:1',
        'solicitante' => 'required|max:200',
        'cep'         => 'required',
        'uf'          => 'required',
        'municipio'   => 'required',
        'bairro'      => 'required',
        'rua'         => 'required',
        'despachante' => 'required|max:200'
    ];

    public function produtos(){
        return $this->hasOne(Produtos::class, 'id', 'produto_id');
    }

    /**
     * Exibo a data de cadastro do pedido no padrão BR
     * @return string
     */
    public function getDataCriacaoAttribute(){
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

    /**
     * Exibo a data da ultima atualização do pedido no padão BR
     * @return string
     */
    public function getDataAtualizacaoAttribute(){
        return Carbon::parse($this->updated_at)->format('d/m/Y H:i:s');
    }
}
