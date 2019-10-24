<?php

namespace Tests\Unit;

use App\ClassModel;
use App\StudentModel;
use App\StudentSubjectModel;
use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentModelTest extends TestCase
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

    public function test_it_belong_to_class()
    {
        $this->assertBelongsTo(ClassModel::class, 'class_code', 'id', new StudentModel, 'ClassM');
    }

    public function test_it_belong_to_user()
    {
        $this->assertBelongsTo(User::class, 'user_id', 'id', new StudentModel, 'user');
    }

    public function test_it_has_many_mark()
    {
        $this->assertHasMany(StudentSubjectModel::class, 'student_code', new StudentModel, 'studentSubjects');
    }

    public function assertBelongsToMany($related, $model, $relationName)
    {
        $relation = $model->$relationName();
        $this->assertInstanceOf(BelongsToMany::class, $relation, 'Relation is wrong');
        $this->assertInstanceOf($related, $relation->getRelated(), 'Related model is wrong');
    }

    public function assertHasMany($related, $model, $relationName)
    {
        $relation = $model->$relationName();
        $this->assertInstanceOf(HasMany::class, $relation, 'Relation is wrong');
        $this->assertInstanceOf($related, $relation->getRelated(), 'Related model is wrong');
    }

    protected function assertBelongsTo($related, $model, $relationName)
    {
        $relation = $model->$relationName();
        $this->assertInstanceOf(BelongsTo::class, $relation, 'Relation is wrong');
        $this->assertInstanceOf($related, $relation->getRelated(), 'Related model is wrong');
    }
}
