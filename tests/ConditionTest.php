<?php

namespace Budgegeria\Dumpedie\Tests;

use Budgegeria\Dumpedie\Condition;
use PHPUnit\Framework\TestCase;

class ConditionTest extends TestCase
{
    public function testCondition()
    {
        $condition = new Condition(true);
        self::assertTrue($condition->isVisible());

        $condition = new Condition(false);
        self::assertFalse($condition->isVisible());
    }

    public function testConditionFunction()
    {
        self::assertTrue(dd_cond(true)->isVisible());

        self::assertFalse(dd_cond(false)->isVisible());
    }
}
