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
        'despachante',
        'situacao_pedido'
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
        'cep'         => 'required|max:8',
        'uf'          => 'required|max:2|min:2',
        'municipio'   => 'required',
        'bairro'      => 'required',
        'rua'         => 'required',
        'despachante' => 'required|max:200'
    ];

    public function produtos(){
        return $this->hasOne(Produtos::class, 'id', 'produto_id');
    }

    public static function boot(){
        parent::boot();

        /**
         * Ao criar um novo pedido eu subtraio a quantidade solicitada da tabela de produtos
         */
        self::created(function($model){
            $produtos = Produtos::where('id', $model->produto_id)->first();
            $produtos->quantidade -= $model->quantidade;
            $produtos->save();
        });
    }


    /**
     * Exibo a data de cadastro do pedido no padrão BR
     * @return string
     */
    public function getDataCriacaoAttribute(){
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

    public function getDataHoraCriacaoAttribute(){
        return Carbon::parse($this->created_at)->format('d/m/Y \à\s H:i:s');
    }

    /**
     * Exibo a data da ultima atualização do pedido no padão BR
     * @return string
     */
    public function getDataAtualizacaoAttribute(){
        return Carbon::parse($this->updated_at)->format('d/m/Y \à\s H:i:s');
    }

    /**
     * Devolve a situação do pedido.
     * @return string
     */
    public function getSituacaoAttribute(){
        switch ($this->situacao_pedido){
            case 1:
                return 'Pendente de envio';
            case 2:
                return 'Enviado';
            case 3:
                return 'Entregue';
            default:
                return 'Desconhecido';
        }
    }
}
