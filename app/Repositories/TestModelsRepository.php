<?php

namespace App\Repositories;

use App\Models\TestModels;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TestModelsRepository
 * @package App\Repositories
 * @version March 17, 2019, 6:10 pm UTC
 *
 * @method TestModels findWithoutFail($id, $columns = ['*'])
 * @method TestModels find($id, $columns = ['*'])
 * @method TestModels first($columns = ['*'])
*/
class TestModelsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_name',
        'id_company',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TestModels::class;
    }
}
