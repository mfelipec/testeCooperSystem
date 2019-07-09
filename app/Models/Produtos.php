<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Produtos
 * @package App\Models
 * @version July 9, 2019, 12:45 am UTC
 *
 */
class Produtos extends Model
{
    use SoftDeletes;

    public $table = 'produtos';
    protected $id = 'id';
    protected $fillable = ['nome', 'valor', 'quantidade', 'situacao'];

    protected $dates = ['deleted_at'];

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
     */
    public static $rules = [
        'nome'       => 'required|unique:produtos,nome|max:200',
        'valor'      => 'required',
        'quantidade' => 'required'
    ];

    public static $rulesUpdate = [
        'valor'      => 'required',
        'quantidade' => 'required'
    ];

    public function getFSituacaoAttribute(){
        return ($this->situacao)?'Disponivel':'Indisponivel';
    }

    public function getDataCriacaoAttribute(){
        return Carbon::parse($this->created_at)->format('d/m/Y H:i:s');
    }

    public function getDataAtualizacaoAttribute(){
        return Carbon::parse($this->updated_at)->format('d/m/Y H:i:s');
    }
    
}
