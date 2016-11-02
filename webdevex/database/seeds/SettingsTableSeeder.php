<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'beginPeriod1' => '2016-11-01',
            'beginPeriod2' => '2016-11-09',
            'beginPeriod3' => '2016-11-16',
            'beginPeriod4' => '2016-11-23',
            'endPeriod1' => '2016-11-08',
            'endPeriod2' => '2016-11-15',
            'endPeriod3' => '2016-11-22',
            'endPeriod4' => '2016-11-29',
            'now' => '2016-11-25',
        ]);
    }
}
