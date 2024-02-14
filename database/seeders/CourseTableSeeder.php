<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name'   => 'B.Tech',
            'slug'   => Str::slug('B.Tech')
        ]);

        Course::create([
            'name'   => 'B.Tech(Leet)',
            'slug'   => Str::slug('B.Tech(Leet)')
        ]);

        Course::create([
            'name'   => 'B.Tech.CSE',
            'slug'   => Str::slug('B.Tech.CSE')
        ]);

        Course::create([
            'name'   => 'B.Tech.CSE (AI & DS)',
            'slug'   => Str::slug('B.Tech.CSE (AI & DS)')
        ]);

        Course::create([
            'name'   => 'B.Tech.CSE (CS)',
            'slug'   => Str::slug('B.Tech.CSE (CS)')
        ]);

        Course::create([
            'name'   => 'B.Tech.CSE (AI & ML)',
            'slug'   => Str::slug('B.Tech.CSE (AI & ML)')
        ]);

        Course::create([
            'name'   => 'B.Tech.CSE (Leet)',
            'slug'   => Str::slug('B.Tech.CSE (Leet)')
        ]);

        Course::create([
            'name'   => 'B.Tech Hons',
            'slug'   => Str::slug('B.Tech Hons')
        ]);

        Course::create([
            'name'   => 'B.Tech Hons (Leet)',
            'slug'   => Str::slug('B.Tech Hons (Leet)')
        ]);

        Course::create([
            'name'   => 'BBA',
            'slug'   => Str::slug('BBA')
        ]);

        Course::create([
            'name'   => 'BCA',
            'slug'   => Str::slug('BCA')
        ]);

        Course::create([
            'name'   => 'BCA (Cloud Technology & Information Security)',
            'slug'   => Str::slug('BCA (Cloud Technology & Information Security)')
        ]);

        Course::create([
            'name'   => 'BCA (Cloud Computing)',
            'slug'   => Str::slug('BCA (Cloud Computing)')
        ]);

        Course::create([
            'name'   => 'B.Pharm',
            'slug'   => Str::slug('B.Pharm')
        ]);

        Course::create([
            'name'   => 'B.Pharm (Leet)',
            'slug'   => Str::slug('B.Pharm (Leet)')
        ]);

        Course::create([
            'name'   => 'D.Pharm',
            'slug'   => Str::slug('D.Pharm')
        ]);

        Course::create([
            'name'   => 'Diploma Mech',
            'slug'   => Str::slug('Diploma Mech')
        ]);

        Course::create([
            'name'   => 'Diploma Mech (Leet)',
            'slug'   => Str::slug('Diploma Mech (Leet)')
        ]);

        Course::create([
            'name'   => 'MBA',
            'slug'   => Str::slug('MBA')
        ]);

        Course::create([
            'name'   => 'MCA',
            'slug'   => Str::slug('MCA')
        ]);
    }
}
