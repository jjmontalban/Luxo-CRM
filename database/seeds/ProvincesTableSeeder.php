<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->insert(
            [
                [
                    'id' => 53,
                    'country_id' => 6,
                    'name' => 'Álava',
                    'iso_code' => 'VI',
                ],
                [
                    'id' => 54,
                    'country_id' => 6,
                    'name' => 'Albacete',
                    'iso_code' => 'AB',
                ],
                [
                    'id' => 55,
                    'country_id' => 6,
                    'name' => 'Alicante',
                    'iso_code' => 'ALI',
                ],
                [
                    'id' => 56,
                    'country_id' => 6,
                    'name' => 'Almería',
                    'iso_code' => 'AL',
                ],
                [
                    'id' => 57,
                    'country_id' => 6,
                    'name' => 'Asturias',
                    'iso_code' => 'AB',
                ],
                [
                    'id' => 58,
                    'country_id' => 6,
                    'name' => 'Ávila',
                    'iso_code' => 'AV',
                ],
                [
                    'id' => 59,
                    'country_id' => 6,
                    'name' => 'Badajoz',
                    'iso_code' => 'BA',
                ],
                [
                    'id' => 60,
                    'country_id' => 6,
                    'name' => 'Barcelona',
                    'iso_code' => 'B',
                ],                
                [
                    'id' => 61,
                    'country_id' => 6,
                    'name' => 'Burgos',
                    'iso_code' => 'BU',
                ],
                [
                    'id' => 62,
                    'country_id' => 6,
                    'name' => 'Cáceres',
                    'iso_code' => 'CC',
                ],
                [
                    'id' => 63,
                    'country_id' => 6,
                    'name' => 'Cádiz',
                    'iso_code' => 'CA',
                ],
                [
                    'id' => 64,
                    'country_id' => 6,
                    'name' => 'Cantabria',
                    'iso_code' => 'S',
                ],
                [
                    'id' => 65,
                    'country_id' => 6,
                    'name' => 'Castellón',
                    'iso_code' => 'CS',
                ],
                [
                    'id' => 66,
                    'country_id' => 6,
                    'name' => 'Cuidad Real',
                    'iso_code' => 'CR',
                ],
                [
                    'id' => 67,
                    'country_id' => 6,
                    'name' => 'Córdoba',
                    'iso_code' => 'CO',
                ],
                [
                    'id' => 68,
                    'country_id' => 6,
                    'name' => 'Coruña',
                    'iso_code' => 'C',
                ],
                [
                    'id' => 69,
                    'country_id' => 6,
                    'name' => 'Cuenca',
                    'iso_code' => 'CU',
                ],
                [
                    'id' => 70,
                    'country_id' => 6,
                    'name' => 'Gerona',
                    'iso_code' => 'GE',
                ],
                [
                    'id' => 71,
                    'country_id' => 6,
                    'name' => 'Granada',
                    'iso_code' => 'GR',
                ],
                [
                    'id' => 72,
                    'country_id' => 6,
                    'name' => 'Guadalajara',
                    'iso_code' => 'GU',
                ],
                [
                    'id' => 73,
                    'country_id' => 6,
                    'name' => 'Guipúzcoa',
                    'iso_code' => 'SS',
                ],
                [
                    'id' => 74,
                    'country_id' => 6,
                    'name' => 'Huelva',
                    'iso_code' => 'HU',
                ],
                [
                    'id' => 75,
                    'country_id' => 6,
                    'name' => 'Huesca',
                    'iso_code' => 'HU',
                ],
                [
                    'id' => 76,
                    'country_id' => 245,
                    'name' => 'Baleares',
                    'iso_code' => 'IB',
                ],
                [
                    'id' => 77,
                    'country_id' => 6,
                    'name' => 'Jaén',
                    'iso_code' => 'J',
                ],
                [
                    'id' => 78,
                    'country_id' => 6,
                    'name' => 'León',
                    'iso_code' => 'LE',
                ],
                [
                    'id' => 79,
                    'country_id' => 6,
                    'name' => 'Lérida',
                    'iso_code' => 'L',
                ],
                [
                    'id' => 80,
                    'country_id' => 6,
                    'name' => 'Lugo',
                    'iso_code' => 'LU',
                ],
                [
                    'id' => 81,
                    'country_id' => 6,
                    'name' => 'Madrid',
                    'iso_code' => 'M',
                ],
                [
                    'id' => 82,
                    'country_id' => 6,
                    'name' => 'Málaga',
                    'iso_code' => 'MA',
                ],
                [
                    'id' => 83,
                    'country_id' => 6,
                    'name' => 'Murcia',
                    'iso_code' => 'MU',
                ],
                [
                    'id' => 84,
                    'country_id' => 6,
                    'name' => 'Navarra',
                    'iso_code' => 'NA',
                ],
                [
                    'id' => 85,
                    'country_id' => 6,
                    'name' => 'Orense',
                    'iso_code' => 'OR',
                ],
                [
                    'id' => 86,
                    'country_id' => 6,
                    'name' => 'Palencia',
                    'iso_code' => 'PA',
                ],
                [
                    'id' => 87,
                    'country_id' => 245,
                    'name' => 'Las Palmas',
                    'iso_code' => 'LP',
                ],
                [
                    'id' => 88,
                    'country_id' => 6,
                    'name' => 'Ponteverda',
                    'iso_code' => 'PO',
                ],
                [
                    'id' => 89,
                    'country_id' => 6,
                    'name' => 'La Rioja',
                    'iso_code' => 'LR',
                ],
                [
                    'id' => 90,
                    'country_id' => 6,
                    'name' => 'Salamanca',
                    'iso_code' => 'SA',
                ],
                [
                    'id' => 91,
                    'country_id' => 6,
                    'name' => 'Segovia',
                    'iso_code' => 'SG',
                ],
                [
                    'id' => 92,
                    'country_id' => 6,
                    'name' => 'Sevilla',
                    'iso_code' => 'SE',
                ],
                [
                    'id' => 93,
                    'country_id' => 6,
                    'name' => 'Soria',
                    'iso_code' => 'SO',
                ],
                [
                    'id' => 94,
                    'country_id' => 6,
                    'name' => 'tarragona',
                    'iso_code' => 'TA',
                ],
                [
                    'id' => 95,
                    'country_id' => 245,
                    'name' => 'Tenerife',
                    'iso_code' => 'TF',
                ],
                [
                    'id' => 96,
                    'country_id' => 6,
                    'name' => 'Teruel',
                    'iso_code' => 'TE',
                ],
                [
                    'id' => 97,
                    'country_id' => 6,
                    'name' => 'Toledo',
                    'iso_code' => 'TO',
                ],
                [
                    'id' => 98,
                    'country_id' => 6,
                    'name' => 'Valencia',
                    'iso_code' => 'V',
                ],
                [
                    'id' => 99,
                    'country_id' => 6,
                    'name' => 'Valladolid',
                    'iso_code' => 'VA',
                ],
                [
                    'id' => 100,
                    'country_id' => 6,
                    'name' => 'Vizcaya',
                    'iso_code' => 'VI',
                ],
                [
                    'id' => 101,
                    'country_id' => 6,
                    'name' => 'Zamora',
                    'iso_code' => 'ZAM',
                ],
                [
                    'id' => 102,
                    'country_id' => 6,
                    'name' => 'Zaragoza',
                    'iso_code' => 'ZA',
                ],
                [
                    'id' => 103,
                    'country_id' => 6,
                    'name' => 'Fuera de España',
                    'iso_code' => 'FE',
                ],
                [
                    'id' => 104,
                    'country_id' => 245,
                    'name' => 'Ceuta',
                    'iso_code' => 'CE',
                ],
                [
                    'id' => 105,
                    'country_id' => 245,
                    'name' => 'Melilla',
                    'iso_code' => 'MEL',
                ],
                [
                    'id' => 106,
                    'country_id' => 8,
                    'name' => 'Córcega',
                    'iso_code' => 'COR',
                ],
                [
                    'id' => 107,
                    'country_id' => 8,
                    'name' => 'Metropolitana',
                    'iso_code' => 'MET',
                ],
                [
                    'id' => 108,
                    'country_id' => 10,
                    'name' => 'Sicilia',
                    'iso_code' => 'SIC',
                ]
            ]
        );
    }
}   