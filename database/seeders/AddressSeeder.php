<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            Country::truncate();
            $countries = [
                ['id' => 1, 'name' => 'India', 'abbreviation' => 'AF', 'dial_code' => 91, 'flag' => 'india'],
            ];
            DB::table('countries')->insert($countries);
            
            $url = "https://countriesnow.space/api/v0.1/countries/states";
            $data = ['country' => 'India'];
            $client = new \GuzzleHttp\Client();

            $response = $client->post($url, [
                'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
                'body'    => json_encode($data)
            ]);

            $statusCode = $response->getStatusCode();
            $resBody = $response->getBody();
            if ($statusCode === 200) {
                $data =  json_decode($resBody, true);
                foreach ($data['data']['states'] as $state) {
                    $stateName = $state['name'];
                    $stateData = State::where('name', $stateName)->first();
                    if (!isset($stateData)) {
                        $stateData = State::create([
                            'country_id' => '1',
                            'name' => strtolower($stateName),
                            'abbreviation' => $state['state_code'],
                        ]);
                    }

                    try {
                        $url = "https://countriesnow.space/api/v0.1/countries/state/cities";
                        $data = ['country' => 'India', 'state' => strtolower($stateName)];
                        $client = new \GuzzleHttp\Client();

                        $response = $client->post($url, [
                            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
                            'body'    => json_encode($data)
                        ]);
                        $statusCode = $response->getStatusCode();
                        $resBody = $response->getBody();
                        if ($statusCode === 200) {
                            $data =  json_decode($resBody, true);
                            foreach ($data['data'] as $city) {
                                $cityData = City::where(['state_id' => $stateData->id, 'name' => $city])->first();
                                if (!isset($cityData)) {
                                    City::create([
                                        'country_id' => '1',
                                        'name' => strtolower($city),
                                        'state_id' => $stateData->id
                                    ]);
                                }
                            }
                        }
                    } catch (\Exception $e) {
                        return false;
                    }
                }
            }
        } catch (\Exception $e) {
            return false;
        }
    }
}
