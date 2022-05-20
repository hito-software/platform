<?php

namespace Hito\Platform\Database\Seeders;

use Hito\Platform\Models\Timezone;
use Illuminate\Database\Seeder;

class TimezoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getDataFromJson() as $timezone) {
            Timezone::firstOrCreate([
                'name'      => ($timezone['name'] ?? null),
                'abbr'      => ($timezone['abbr'] ?? null),
                'offset'    => ($timezone['offset'] ?? null),
                'isdst'     => ($timezone['isdst'] ?? null),
                'text'      => ($timezone['text'] ?? null),
                'utc'       => ($timezone['utc'] ?? null),
            ]);
        }
    }

    private function getDataFromJson()
    {
        $route = dirname(__FILE__, 4) . '/database/data/timezones.json';

        return json_decode(file_get_contents($route), true);
    }
}
