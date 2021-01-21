<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Criteria::query()->create(
            ['name' => 'communication']
        );
        Criteria::query()->create(
            ['name' => 'ownership']
        );
        Criteria::query()->create(
            ['name' => 'respect / Empathy']
        );
        Criteria::query()->create(
            ['name' => 'integrity']
        );
        Criteria::query()->create(
            ['name' => 'professionalism / job excellence']
        );
        Criteria::query()->create(
            ['name' => 'team work']
        );
    }
}
