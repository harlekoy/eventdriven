<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->formattedCountries() as $country) {
            Country::create($country);
        }
    }

    /**
     * Get country list.
     *
     * @return array
     */
    public function countries()
    {
        $json = file_get_contents(database_path('json/countries.json'));

        return json_decode($json, true);
    }

    /**
     * Get the saveable country list.
     *
     * @return array
     */
    public function formattedCountries()
    {
        return array_map(function ($country) {
            return collect($country)
                ->mapWithKeys(function ($value, $key) {
                    return [
                        str_replace('-', '_', $key) => $value
                    ];
                })
                ->all();
        }, $this->countries());
    }
}
