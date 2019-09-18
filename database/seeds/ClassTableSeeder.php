<?php

use Illuminate\Database\Seeder;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\ClassModel::class)->create([
            'name' => 'Công nghệ thông tin',
        ]);
    }
}
