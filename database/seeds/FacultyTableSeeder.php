<?php

use Illuminate\Database\Seeder;

class FacultyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Faculty::class)->create([
            'name' => 'Khoa học máy tính',
            'slug' => 'Khoa-hoc-may-tinh',
        ]);
    }
}
