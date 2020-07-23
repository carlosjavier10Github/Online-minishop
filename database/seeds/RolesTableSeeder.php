<?php

use Illuminate\Database\Seeder;
use App\CustomPermision\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



    	Role::create([
    		'name' => 'Admin',
    		'slug' => 'admin',
    		'description' => 'sistem administrator',
    		'full-access' => 'yes',
    	]);
    	Role::create([
    		'name' => 'Guest',
    		'slug' => 'guest',
    		'description' => 'Invitado',
    		'full-access' => 'no',
    	]);
    	return Role::create([
    		'name' => 'test',
    		'slug' => 'test',
    		'description' => 'Prueba',
    		'full-access' => 'no',
    	]);

    }
}


