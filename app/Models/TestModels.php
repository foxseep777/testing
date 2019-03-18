<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TestModels
 * @package App\Models
 * @version March 17, 2019, 6:10 pm UTC
 *
 * @property string user_name
 * @property string id_company
 * @property string email
 */
class TestModels extends Model
{
    use SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_name',
        'id_company',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_name' => 'string',
        'id_company' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'user_name' => 'required',
        'id_company' => 'required',
        'email' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    
}
