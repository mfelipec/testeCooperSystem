<?php

namespace App\Models;

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
    protected $fillable = ['nome', 'valor', 'quantidade'];

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
        
    ];

    
}
