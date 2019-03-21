<?php

use Faker\Factory as Faker;
use App\Models\instandartModel;
use App\Repositories\instandartModelRepository;

trait MakeinstandartModelTrait
{
    /**
     * Create fake instance of instandartModel and save it in database
     *
     * @param array $instandartModelFields
     * @return instandartModel
     */
    public function makeinstandartModel($instandartModelFields = [])
    {
        /** @var instandartModelRepository $instandartModelRepo */
        $instandartModelRepo = App::make(instandartModelRepository::class);
        $theme = $this->fakeinstandartModelData($instandartModelFields);
        return $instandartModelRepo->create($theme);
    }

    /**
     * Get fake instance of instandartModel
     *
     * @param array $instandartModelFields
     * @return instandartModel
     */
    public function fakeinstandartModel($instandartModelFields = [])
    {
        return new instandartModel($this->fakeinstandartModelData($instandartModelFields));
    }

    /**
     * Get fake data of instandartModel
     *
     * @param array $postFields
     * @return array
     */
    public function fakeinstandartModelData($instandartModelFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'quota' => $fake->word,
            'create_at' => $fake->randomDigitNotNull
        ], $instandartModelFields);
    }
}
