<?php

namespace Database\Seeders;

use App\Models\HosteFloor;
use Illuminate\Database\Seeder;

class HosteFloorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HosteFloor::create([
            'hostel_id'      => 1,
            'floor_name'     => 'OBH GROUND FLOOR'
        ]);

        HosteFloor::create([
            'hostel_id'      => 1,
            'floor_name'     => 'OBH 1st FLOOR'
        ]);

        HosteFloor::create([
            'hostel_id'      => 1,
            'floor_name'     => 'OBH 2nd FLOOR'
        ]);

        HosteFloor::create([
            'hostel_id'      => 1,
            'floor_name'     => 'OBH 3rd FLOOR'
        ]);

        HosteFloor::create([
            'hostel_id'      => 2,
            'floor_name'     => 'NBH GROUND FLOOR'
        ]);

        HosteFloor::create([
            'hostel_id'      => 2,
            'floor_name'     => 'NBH 1st FLOOR'
        ]);

        HosteFloor::create([
            'hostel_id'      => 2,
            'floor_name'     => 'NBH 2nd FLOOR'
        ]);

        HosteFloor::create([
            'hostel_id'      => 2,
            'floor_name'     => 'NBH 3rd FLOOR'
        ]);

        HosteFloor::create([
            'hostel_id'      => 3,
            'floor_name'     => 'NNBH 1st FLOOR'
        ]);

        HosteFloor::create([
            'hostel_id'      => 3,
            'floor_name'     => 'NNBH 2nd FLOOR'
        ]);
    }
}
