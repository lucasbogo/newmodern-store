<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingDivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipping_divisions')->delete();

        DB::table('shipping_divisions')->insert([
            ['id' => 1, 'shipping_division_name' => 'Acre'],
            ['id' => 2, 'shipping_division_name' => 'Alagoas'],
            ['id' => 3, 'shipping_division_name' => 'Amapá'],
            ['id' => 4, 'shipping_division_name' => 'Amazonas'],
            ['id' => 5, 'shipping_division_name' => 'Bahia'],
            ['id' => 6, 'shipping_division_name' => 'Ceará'],
            ['id' => 7, 'shipping_division_name' => 'Distrito Federal'],
            ['id' => 8, 'shipping_division_name' => 'Espírito Santo'],
            ['id' => 9, 'shipping_division_name' => 'Goiás'],
            ['id' => 10, 'shipping_division_name' => 'Maranhão'],
            ['id' => 11, 'shipping_division_name' => 'Mato Grosso'],
            ['id' => 12, 'shipping_division_name' => 'Mato Grosso do Sul'],
            ['id' => 13, 'shipping_division_name' => 'Minas Gerais'],
            ['id' => 14, 'shipping_division_name' => 'Pará'],
            ['id' => 15, 'shipping_division_name' => 'Paraíba'],
            ['id' => 16, 'shipping_division_name' => 'Paraná'],
            ['id' => 17, 'shipping_division_name' => 'Pernambuco'],
            ['id' => 18, 'shipping_division_name' => 'Piauí'],
            ['id' => 19, 'shipping_division_name' => 'Rio de Janeiro'],
            ['id' => 20, 'shipping_division_name' => 'Rio Grande do Norte'],
            ['id' => 21, 'shipping_division_name' => 'Rio Grande do Sul'],
            ['id' => 22, 'shipping_division_name' => 'Rondônia'],
            ['id' => 23, 'shipping_division_name' => 'Roraima'],
            ['id' => 24, 'shipping_division_name' => 'Santa Catarina'],
            ['id' => 25, 'shipping_division_name' => 'São Paulo'],
            ['id' => 26, 'shipping_division_name' => 'Sergipe'],
            ['id' => 27, 'shipping_division_name' => 'Tocantins'],
        ]);
    }
}
