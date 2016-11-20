<?php

namespace Budgegeria\Dumpedie\Tests;

use Budgegeria\Dumpedie\Condition;

class ConditionTest extends \PHPUnit_Framework_TestCase
{
    public function testCondition()
    {
        $condition = new Condition(true);
        $this->assertTrue($condition->isVisible());

        $condition = new Condition(false);
        $this->assertFalse($condition->isVisible());
    }

    public function testConditionFunction()
    {
        $this->assertTrue(dd_cond(true)->isVisible());

        $this->assertFalse(dd_cond(false)->isVisible());
    }
}
