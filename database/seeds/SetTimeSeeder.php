<?php

use Illuminate\Database\Seeder;
use App\SetTime;

class SetTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SetTime::create(array(
            'id' => 1,
        	'day' => 1,
        ));

        SetTime::create(array(
            'id' => 2,
        	'day' => 2,
        ));

        SetTime::create(array(
            'id' => 3,
        	'day' => 3,
        ));
    }
}
