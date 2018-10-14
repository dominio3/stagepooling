<?php

use Faker\Factory as Faker;
use App\Models\Stage;
use App\Repositories\StageRepository;

trait MakeStageTrait
{
    /**
     * Create fake instance of Stage and save it in database
     *
     * @param array $stageFields
     * @return Stage
     */
    public function makeStage($stageFields = [])
    {
        /** @var StageRepository $stageRepo */
        $stageRepo = App::make(StageRepository::class);
        $theme = $this->fakeStageData($stageFields);
        return $stageRepo->create($theme);
    }

    /**
     * Get fake instance of Stage
     *
     * @param array $stageFields
     * @return Stage
     */
    public function fakeStage($stageFields = [])
    {
        return new Stage($this->fakeStageData($stageFields));
    }

    /**
     * Get fake data of Stage
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStageData($stageFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'address' => $fake->word,
            'locality' => $fake->word,
            'province' => $fake->word,
            'zipcode' => $fake->word,
            'latitude' => $fake->word,
            'longitude' => $fake->word,
            'observation' => $fake->word,
            'photo' => $fake->word,
            'state' => $fake->word,
            'users_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $stageFields);
    }
}
