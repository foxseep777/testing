<?php

use Faker\Factory as Faker;
use App\Models\instandartModels;
use App\Repositories\instandartModelsRepository;

trait MakeinstandartModelsTrait
{
    /**
     * Create fake instance of instandartModels and save it in database
     *
     * @param array $instandartModelsFields
     * @return instandartModels
     */
    public function makeinstandartModels($instandartModelsFields = [])
    {
        /** @var instandartModelsRepository $instandartModelsRepo */
        $instandartModelsRepo = App::make(instandartModelsRepository::class);
        $theme = $this->fakeinstandartModelsData($instandartModelsFields);
        return $instandartModelsRepo->create($theme);
    }

    /**
     * Get fake instance of instandartModels
     *
     * @param array $instandartModelsFields
     * @return instandartModels
     */
    public function fakeinstandartModels($instandartModelsFields = [])
    {
        return new instandartModels($this->fakeinstandartModelsData($instandartModelsFields));
    }

    /**
     * Get fake data of instandartModels
     *
     * @param array $postFields
     * @return array
     */
    public function fakeinstandartModelsData($instandartModelsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'quota' => $fake->word,
            'created_at' => $fake->randomDigitNotNull,
            'updated_at' => $fake->randomDigitNotNull
        ], $instandartModelsFields);
    }
}
