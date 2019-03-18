<?php

namespace App\Repositories;

use App\Models\instandartModels;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class instandartModelsRepository
 * @package App\Repositories
 * @version March 17, 2019, 5:50 pm UTC
 *
 * @method instandartModels findWithoutFail($id, $columns = ['*'])
 * @method instandartModels find($id, $columns = ['*'])
 * @method instandartModels first($columns = ['*'])
*/
class instandartModelsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'quota'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return instandartModels::class;
    }
}
