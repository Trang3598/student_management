<?php

namespace Tests\Unit\Repositories;

use Tests\TestCase;
use App\Models\Student;

class StudentTest extends TestCase
{
    /**
     * A basic unit test store
     *
     * @return void
     */
    public function testCreate()
    {
        Student::create([
            'class_code' => 1,
            'name' => 'Le Duc Cuong',
            'gender' => '1',
            'birthday' => '1998-01-11',
            'image' => 'test.jpg',
            'address' => 'Ha Noi',
            'phone' => '0350357599',
            'user_id' => '1'
        ]);
        $latestStudent = Student::all()->last();
        $this->assertEquals('Le Duc Cuong', $latestStudent->name, 'False');
        $this->assertEquals('1', $latestStudent->class_code, 'false');
        $this->assertEquals('1', $latestStudent->gender, 'false');
        $this->assertEquals('1998-01-11', $latestStudent->birthday, 'false');
        $this->assertEquals('test.jpg', $latestStudent->image, 'false');
        $this->assertEquals('Ha Noi', $latestStudent->address, 'false');
        $this->assertEquals('0350357599', $latestStudent->phone, 'false');
        $this->assertEquals('1', $latestStudent->user_id, 'false');
    }
    //pass
    public function testUpdate()
    {
        $student = Student::create([
            'class_code' => 1,
            'name' => 'Hoang Ba Dao',
            'gender' => '1',
            'birthday' => '1998-10-11',
            'image' => 'test.jpg',
            'address' => 'Ha Nam',
            'phone' => '0357689900',
            'user_id' => '1'
        ]);
        $result = $student->update([
            'name' => 'Le trong huy',
        ]);
        $this->assertEquals(true, $result);
    }
    //pass
    public function testDelete()
    {
        $student = Student::create([
            'class_code' => 1,
            'name' => 'ElninoDC',
            'gender' => '1',
            'birthday' => '1998-12-11',
            'image' => 'test.jpg',
            'address' => 'Nam Dinh',
            'phone' => '0357689900',
            'user_id' => '1'
        ]);
        $result = $student->delete();
        $this->assertEquals(true, $result);
    }
}
