<?php

use Illuminate\Database\Seeder;
use App\Hospital;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Hospital::class, 12)->create();
    }
}
