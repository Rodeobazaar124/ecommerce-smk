<?php

namespace Database\Seeders;

use App\Models\Province;
use GuzzleHttp\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.rajaongkir.com/starter/province', [
            'headers' => [
                'key' => config('app.rajaongkir_api_key')
            ],

        ]);

        $body = json_decode($response->getBody(), true);
        $results = $body['rajaongkir']['results'];

        foreach ($results as $result) {
            Province::create([
                'id' => $result['province_id'],
                'name' => $result['province'],
            ]);
        }
    }
}
