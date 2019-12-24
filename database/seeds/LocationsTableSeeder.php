<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'name'          => 'Kimara',
            'description'   => 'All streets in Kimara',
            'price'         => '5000'
        ]);
        Location::create([
            'name'          => 'Kinondoni',
            'description'   => 'All streets in Kiondoni',
            'price'         => '6000'
        ]);
    }
}
