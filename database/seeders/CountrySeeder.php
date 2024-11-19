<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usaStates = [
            "AL" => 'Alabama',
            "AK" => 'Alaska',
            "AZ" => 'Arizona',
            "AR" => 'Arkansas',
            "CA" => 'California',
        ];
        $indiaStates = [
            "AP" => 'Andhra Pradesh',
            "MH" => 'Maharashtra',
            "KA" => 'Karnataka',
            "TN" => 'Tamil Nadu',
            "UP" => 'Uttar Pradesh',
        ];

        $germanyStates = [
            "BW" => 'Baden-Württemberg',
            "BY" => 'Bavaria',
            "HE" => 'Hesse',
            "NI" => 'Lower Saxony',
            "NRW" => 'North Rhine-Westphalia',
        ];


        $mexicoStates = [
            "AGU" => 'Aguascalientes',
            "BCN" => 'Baja California',
            "BCS" => 'Baja California Sur',
            "CAM" => 'Campeche',
            "CHP" => 'Chiapas',
            "CHH" => 'Chihuahua',
            "CMX" => 'Ciudad de México',
            "COA" => 'Coahuila de Zaragoza',
            "COL" => 'Colima',
            "DUR" => 'Durango',
            "GUA" => 'Guanajuato',
            "GRO" => 'Guerrero',
            "HID" => 'Hidalgo',
            "JAL" => 'Jalisco',
            "MEX" => 'Estado de México',
            "MIC" => 'Michoacán de Ocampo',
            "MOR" => 'Morelos',
            "NAY" => 'Nayarit',
            "NLE" => 'Nuevo León',
            "OAX" => 'Oaxaca',
            "PUE" => 'Puebla',
            "QUE" => 'Querétaro',
            "ROO" => 'Quintana Roo',
            "SLP" => 'San Luis Potosí',
            "SIN" => 'Sinaloa',
            "SON" => 'Sonora',
            "TAB" => 'Tabasco',
            "TAM" => 'Tamaulipas',
            "TLA" => 'Tlaxcala',
            "VER" => 'Veracruz de Ignacio de la Llave',
            "YUC" => 'Yucatán',
            "ZAC" => 'Zacatecas',
        ];

        $countries = [
            ['code' => 'geo', 'name' => 'Georgia', 'states' => null],
            ['code' => 'ind', 'name' => 'India', 'states' => json_encode($indiaStates)],
            ['code' => 'usa', 'name' => 'United States of America', 'states' => json_encode($usaStates)],
            ['code' => 'ger', 'name' => 'Germany', 'states' => json_encode($germanyStates)],
            ['code' => 'fra', 'name' => 'France', 'states' => null],
            ['code' => 'jpn', 'name' => 'Japan', 'states' => null],
            ['code' => 'mex', 'name' => 'Mexico', 'states' => json_encode($mexicoStates)],
            ['code' => 'can', 'name' => 'Canada', 'states' => null],
            ['code' => 'bra', 'name' => 'Brazil', 'states' => null],
            ['code' => 'aus', 'name' => 'Australia', 'states' => null],
            ['code' => 'esp', 'name' => 'Spain', 'states' => null],
            ['code' => 'ita', 'name' => 'Italy', 'states' => null],
        ];

        Country::insert($countries);
    }
}
