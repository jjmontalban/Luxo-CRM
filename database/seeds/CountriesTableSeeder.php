<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Alemania',
                    'iso_code' => 'DE',
                ],
                [
                    'id' => 2,
                    'name' => 'Austria',
                    'iso_code' => 'AT',
                ],
                [
                    'id' => 3,
                    'name' => 'Bélgica',
                    'iso_code' => 'BE',
                ],
                [
                    'id' => 6,
                    'name' => 'España',
                    'iso_code' => 'ES',
                ],
                [
                    'id' => 40,
                    'name' => 'Andorra',
                    'iso_code' => 'AD',
                ],
                [
                    'id' => 8,
                    'name' => 'Francia',
                    'iso_code' => 'FR',
                ],
                [
                    'id' => 9,
                    'name' => 'Grecia',
                    'iso_code' => 'GR',
                ],
                [
                    'id' => 10,
                    'name' => 'Italia',
                    'iso_code' => 'IT',
                ],
                [
                    'id' => 12,
                    'name' => 'Luxemburgo',
                    'iso_code' => 'LU',
                ],
                [
                    'id' => 13,
                    'name' => 'Holanda',
                    'iso_code' => 'NL',
                ],
                [
                    'id' => 14,
                    'name' => 'Polonia',
                    'iso_code' => 'PL',
                ],
                [
                    'id' => 15,
                    'name' => 'Portugal',
                    'iso_code' => 'PT',
                ],
                [
                    'id' => 16,
                    'name' => 'Republica Checa',
                    'iso_code' => '',
                ],
                [
                    'id' => 17,
                    'name' => 'Reino Unido',
                    'iso_code' => 'GB',
                ],
                [
                    'id' => 19,
                    'name' => 'Suiza',
                    'iso_code' => '',
                ],
                [
                    'id' => 20,
                    'name' => 'Dinamarca',
                    'iso_code' => '',
                ],
                [
                    'id' => 97,
                    'name' => 'Gibraltar',
                    'iso_code' => 'GI',
                ],
                [
                    'id' => 104,
                    'name' => 'Guyana',
                    'iso_code' => '',
                ],
                [
                    'id' => 98,
                    'name' => 'Guadalupe (Francia)',
                    'iso_code' => 'GP',
                ],
                [
                    'id' => 141,
                    'name' => 'Martinica (Francia)',
                    'iso_code' => 'MQ',
                ],
                [
                    'id' => 152,
                    'name' => 'Marruecos',
                    'iso_code' => 'MA',
                ],
                [
                    'id' => 158,
                    'name' => 'Nueva Caledonia (Francia)',
                    'iso_code' => 'NC',
                ],
                [
                    'id' => 176,
                    'name' => 'Reunión (Francia)',
                    'iso_code' => 'RE',
                ],
                [
                    'id' => 245,
                    'name' => 'Baleares, Canarias, Ceuta y Melilla (España)',
                    'iso_code' => 'CCM',
                ],
            ]
        );
    }
}
