<?php

use Illuminate\Database\Seeder;
use App\Models\Classification;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classification::insert([
            ['id'=>'1001', 'classification'=>'month'],
            ['id'=>'1002', 'classification'=>'week'],
            ['id'=>'1003', 'classification'=>'basic'],
            ['id'=>'1004', 'classification'=>'credit'],
            ['id'=>'1005', 'classification'=>'year'],
        ]);
    }
}
