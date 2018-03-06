<?php

use Illuminate\Database\Seeder;
use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reply::create(array(
        	'description_reply' => 'Si',
        ));

        Reply::create(array(
        	'description_reply' => 'No',
        ));
    }
}
