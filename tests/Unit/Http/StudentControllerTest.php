<?php

namespace Tests\Unit;

use App\StudentModel;
use Tests\TestCase;

class StudentControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testCreate()
    {
        $student1 = StudentModel::create([
            'class_code' => 1,
            'name' => 'Nguyen Thanh Nam',
            'gender' => '1',
            'birthday' => '1998-12-11',
            'image' => 'trang.jpg',
            'address' => 'Ha Nam',
            'phone' => '0357689900',
            'user_id' => '1223'
        ]);
        $latestStudent1 = StudentModel::all()->last();
        $this->assertEquals('Nguyen Thanh Nam', $latestStudent1->name, 'False');
        $this->assertEquals('1', $latestStudent1->class_code, 'false');
        $this->assertEquals('1', $latestStudent1->gender, 'false');
        $this->assertEquals('1998-12-11', $latestStudent1->birthday, 'false');
        $this->assertEquals('trang.jpg', $latestStudent1->image, 'false');
        $this->assertEquals('Ha Nam', $latestStudent1->address, 'false');
        $this->assertEquals('0357689900', $latestStudent1->phone, 'false');
        $this->assertEquals('1223', $latestStudent1->user_id, 'false');

    }

    //pass
    public function testUpdate()
    {
        $student = StudentModel::create([
            'class_code' => 1,
            'name' => 'Nguyen Trung Quân',
            'gender' => '1',
            'birthday' => '1998-12-11',
            'image' => 'trang.jpg',
            'address' => 'Ha Nam',
            'phone' => '0357689900',
            'user_id' => '1223'
        ]);
        $result = $student->update([
            'name' => 'Phạm Văn Đồng',
        ]);
        $this->assertEquals(true, $result);
    }

    //pass
    public function testDelete()
    {
        $student = StudentModel::create([
            'class_code' => 1,
            'name' => 'Nguyen Trung Quân',
            'gender' => '1',
            'birthday' => '1998-12-11',
            'image' => 'trang.jpg',
            'address' => 'Ha Nam',
            'phone' => '0357689900',
            'user_id' => '1223'
        ]);
        $result = $student->delete();
        $this->assertEquals(true, $result);
    }
}
