<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;


class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'App_name' => 'Bilal Software OTG',
            'Company_name' => 'Company Empty',
            'creator' => 'Ali Ahmed'
        ]);
    }
}
