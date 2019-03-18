<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class instandartModels
 * @package App\Models
 * @version March 17, 2019, 5:50 pm UTC
 *
 * @property string name
 * @property bigInteger quota
 */
class instandartModels extends Model
{
    use SoftDeletes;

    public $table = 'companies';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


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
      //  'id' => 'required',
        'name' => 'required',
        'quota' => 'required',
      //  'created_at' => 'required',
       // 'updated_at' => 'required' 
    ];

    
}
