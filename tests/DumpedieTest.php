<?php

namespace Budgegeria\Dumpedie\Tests;

use PHPUnit_Framework_Assert;
use PHPUnit_Framework_TestCase;
use Symfony\Component\VarDumper\VarDumper;

class DumpedieTest extends PHPUnit_Framework_TestCase
{
    public function testDumpedie()
    {
        $this->setExpectedArguments([1, 'foo', true, 1.2]);
        dumpedie(1, 'foo', true, 1.2);
    }

    public function testDumpedieWithConditionFalse()
    {
        $this->setExpectedArguments([1, 'foo']);
        dumpedie(1, 'foo', dd_cond(false), true, 1.2);
    }

    public function testDumpedieWithConditionTrue()
    {
        $this->setExpectedArguments([1, 'foo', true, 1.2]);
        dumpedie(1, 'foo', dd_cond(true), true, 1.2);
    }

    /**
     * @param array $arguments
     */
    private function setExpectedArguments(array $arguments)
    {
        VarDumper::setHandler(function ($argument) use (&$arguments) {
            $expected = array_shift($arguments);
            PHPUnit_Framework_Assert::assertSame($expected, $argument);
        });
    }
}