<?php

use Illuminate\Database\Seeder;
use App\Institution;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Institution::create(array(
        	'description_institution' => 'CONAPDIS',
        	));
    }
}
