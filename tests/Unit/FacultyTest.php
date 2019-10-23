<?php

namespace Tests\Unit\Repositories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Faculty;

class FacultyTest extends TestCase
{
    protected $faculty;

public function testExample()
{
    $this->assertTrue(true);
}
    public function testCreate()
    {
        $faculty = Faculty::create([
            'name' => 'Kế toán kiểm toán 2',
        ]);
        $latestFaculty = Faculty::all()->last();
        $this->assertEquals('Kế toán kiểm toán', $latestFaculty->name, 'False');
    }
    //pass
    public function testUpdate()
    {
        $faculty = Faculty::create([
            'name' => 'Kế toán kiểm toán',
            'slug' => 'Ke-toan-kiem-toan',
        ]);
        $result = $faculty->update([
            'name' => 'Kế hoạch',
        ]);
        $this->assertEquals(true, $result);
    }
    //pass
    public function testDelete()
    {
        $faculty = Faculty::create([
            'name' => 'Kế toán kiểm toán',
            'slug' => 'Ke-toan-kiem-toan',
        ]);
        $result = $faculty->delete();
        $this->assertEquals(true, $result);
    }
}
