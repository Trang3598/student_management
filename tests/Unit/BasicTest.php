<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = new User;
        $this->assertInstanceOf(User::class, $user);
    }
    public function testAssert()
    {
        $user = factory(User::class)->make([
            'name' => 'test',
        ]);

        $this->assertTrue(is_string($user->email));

        $this->assertFalse(is_null($user->password));

        $this->assertEquals($user->name, 'test');

        $this->assertNull($user->test);

        $this->assertEmpty($user->username);
    }
}
