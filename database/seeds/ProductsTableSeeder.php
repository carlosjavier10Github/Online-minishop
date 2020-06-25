<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Detail;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$product = new Product();
    	$product->name = 'Piedra mata maduro';
    	$product->brand = 'Mata mierdas';
    	$product->price = 10;
    	$product->save();

    	$detail = new Detail();
    	$detail->detail = 'Peso';
    	$detail->measure = 'Kg';
    	$detail->value = '0.8';
    	$product->details()->save($detail);

    	$detail = new Detail();
    	$detail->detail = 'Color';
    	$detail->measure = null;
    	$detail->value = 'grey';
    	$product->details()->save($detail);

    	$detail = new Detail();
    	$detail->detail = 'Tipo';
    	$detail->measure = null;
    	$detail->value = 'Ignea';
    	$product->details()->save($detail);





    }
}
