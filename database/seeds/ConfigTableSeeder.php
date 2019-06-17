<?php

use Illuminate\Database\Seeder;
use App\config;

class ConfigTableSeeder extends Seeder
{
    public function run()
    {
        $configuracion = config::create([
        	'name'		=>	'Clinica sistema 3',
        	'rif'		=>	'J-3313131313',
        	'telephone'	=>	'02442424244',
        	'address'	=>	'Villa de cura, estado Aragua',
        	'user_id'	=>	'1',
        ]);
    }
}
