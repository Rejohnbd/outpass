<?php

namespace Database\Seeders;

use App\Models\Hostel;
use Illuminate\Database\Seeder;

class HostelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hostel::create([
            'name'          => 'Old Boy Hostel',
            'short_code'    => 'OBH'
        ]);

        Hostel::create([
            'name'          => 'New Boy Hostel',
            'short_code'    => 'NBH'
        ]);

        Hostel::create([
            'name'          => 'Nwe New Boy Hostel',
            'short_code'    => 'NNBH'
        ]);
    }
}
