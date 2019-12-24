<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'          => 'Wheat',
            'description'   => 'Nice one!',
            'weight'        => '2500',
            'price'         => '50000'
        ]);
        Product::create([
            'name'          => 'Soap',
            'description'   => 'Good one!',
            'weight'        => '100',
            'price'         => '30000'
        ]);
        Product::create([
            'name'          => 'Beer',
            'description'   => 'Better!',
            'weight'        => '10',
            'price'         => '20000'
        ]);
    }
}
