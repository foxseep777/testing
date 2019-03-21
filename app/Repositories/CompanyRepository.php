<?php

namespace App\Repositories;

use App\Models\Company;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyRepository
 * @package App\Repositories
 * @version March 20, 2019, 8:16 pm UTC
 *
 * @method Company findWithoutFail($id, $columns = ['*'])
 * @method Company find($id, $columns = ['*'])
 * @method Company first($columns = ['*'])
*/
class CompanyRepository extends BaseRepository
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
        return Company::class;
    }
}
