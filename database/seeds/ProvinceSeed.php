<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->delete();

        $provinces = [
            ['id' => 2, 'name' => 'Ciudad Autónoma de Buenos Aires', 'slug' => 'ciudad-autonoma-de-buenos-aires'],
            ['id' => 6, 'name' => 'Buenos Aires', 'slug' => 'buenos-aires'],
            ['id' => 10, 'name' => 'Catamarca', 'slug' => 'catamarca'],
            ['id' => 14, 'name' => 'Córdoba', 'slug' => 'cordoba'],
            ['id' => 22, 'name' => 'Chaco', 'slug' => 'chaco'],
            ['id' => 26, 'name' => 'Chubut', 'slug' => 'chubut'],
            ['id' => 18, 'name' => 'Corrientes', 'slug' => 'corrientes'],
            ['id' => 30, 'name' => 'Entre ríos', 'slug' => 'entre-rios'],
            ['id' => 34, 'name' => 'Formosa', 'slug' => 'formosa'],
            ['id' => 38, 'name' => 'Jujuy', 'slug' => 'jujuy'],
            ['id' => 42, 'name' => 'La Pampa', 'slug' => 'la-pampa'],
            ['id' => 46, 'name' => 'La Rioja', 'slug' => 'la-rioja'],
            ['id' => 50, 'name' => 'Mendoza', 'slug' => 'mendoza'],
            ['id' => 54, 'name' => 'Misiones', 'slug' => 'misiones'],
            ['id' => 58, 'name' => 'Neuquén', 'slug' => 'neuquen'],
            ['id' => 62, 'name' => 'Río negro', 'slug' => 'rio-negro'],
            ['id' => 66, 'name' => 'Salta', 'slug' => 'salta'],
            ['id' => 70, 'name' => 'San Juan', 'slug' => 'san-juan'],
            ['id' => 74, 'name' => 'San Luis', 'slug' => 'san-luis'],
            ['id' => 78, 'name' => 'Santa Cruz', 'slug' => 'santa-cruz'],
            ['id' => 82, 'name' => 'Santa Fe', 'slug' => 'santa-fe'],
            ['id' => 86, 'name' => 'Santiago del Estero', 'slug' => 'santiago-del-estero'],
            ['id' => 90, 'name' => 'Tucumán', 'slug' => 'tucuman'],
            ['id' => 94, 'name' => 'Tierra del Fuego', 'slug' => 'tierra-del-fuego'],
        ];

        foreach ($provinces as $province) {
           \App\Province::create($province);
        }
    }
}
