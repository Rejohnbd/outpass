<?php

namespace Database\Seeders;

use App\Models\HostelFloor;
use Illuminate\Database\Seeder;

class HostelFloorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HostelFloor::create([
            'hostel_id'      => 1,
            'floor_name'     => 'OBH GROUND FLOOR'
        ]);

        HostelFloor::create([
            'hostel_id'      => 1,
            'floor_name'     => 'OBH 1st FLOOR'
        ]);

        HostelFloor::create([
            'hostel_id'      => 1,
            'floor_name'     => 'OBH 2nd FLOOR'
        ]);

        HostelFloor::create([
            'hostel_id'      => 1,
            'floor_name'     => 'OBH 3rd FLOOR'
        ]);

        HostelFloor::create([
            'hostel_id'      => 2,
            'floor_name'     => 'NBH GROUND FLOOR'
        ]);

        HostelFloor::create([
            'hostel_id'      => 2,
            'floor_name'     => 'NBH 1st FLOOR'
        ]);

        HostelFloor::create([
            'hostel_id'      => 2,
            'floor_name'     => 'NBH 2nd FLOOR'
        ]);

        HostelFloor::create([
            'hostel_id'      => 2,
            'floor_name'     => 'NBH 3rd FLOOR'
        ]);

        HostelFloor::create([
            'hostel_id'      => 3,
            'floor_name'     => 'NNBH 1st FLOOR'
        ]);

        HostelFloor::create([
            'hostel_id'      => 3,
            'floor_name'     => 'NNBH 2nd FLOOR'
        ]);
    }
}
