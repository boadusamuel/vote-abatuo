<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Department::query()->create(
           ['name' => 'Feeding']
       );
       Department::query()->create(
           ['name' => 'Hatchery']
       );
       Department::query()->create(
           ['name' => 'Grading / Transport']
       );
       Department::query()->create(
           ['name' => 'Maintenance']
       );
       Department::query()->create(
           ['name' => 'Hapa']
       );
       Department::query()->create(
           ['name' => 'Spa']
       );
       Department::query()->create(
           ['name' => 'Security']
       );
       Department::query()->create(
           ['name' => 'Administration']
       );
    }
}
