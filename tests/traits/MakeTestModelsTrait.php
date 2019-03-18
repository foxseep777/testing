<?php

use Faker\Factory as Faker;
use App\Models\TestModels;
use App\Repositories\TestModelsRepository;

trait MakeTestModelsTrait
{
    /**
     * Create fake instance of TestModels and save it in database
     *
     * @param array $testModelsFields
     * @return TestModels
     */
    public function makeTestModels($testModelsFields = [])
    {
        /** @var TestModelsRepository $testModelsRepo */
        $testModelsRepo = App::make(TestModelsRepository::class);
        $theme = $this->fakeTestModelsData($testModelsFields);
        return $testModelsRepo->create($theme);
    }

    /**
     * Get fake instance of TestModels
     *
     * @param array $testModelsFields
     * @return TestModels
     */
    public function fakeTestModels($testModelsFields = [])
    {
        return new TestModels($this->fakeTestModelsData($testModelsFields));
    }

    /**
     * Get fake data of TestModels
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTestModelsData($testModelsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_name' => $fake->word,
            'id_company' => $fake->word,
            'email' => $fake->word,
            'created_at' => $fake->randomDigitNotNull,
            'updated_at' => $fake->randomDigitNotNull
        ], $testModelsFields);
    }
}
