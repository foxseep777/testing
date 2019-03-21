<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Company
 * @package App\Models
 * @version March 20, 2019, 8:16 pm UTC
 *
 * @property string name
 * @property bigInteger quota
 */
class Company extends Model
{

    public $table = 'companies';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'quota'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'quota' => 'required',

    ];

    
}
