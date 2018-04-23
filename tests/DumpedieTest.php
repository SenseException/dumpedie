<?php

namespace Budgegeria\Dumpedie\Tests;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Symfony\Component\VarDumper\VarDumper;

class DumpedieTest extends TestCase
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

    public function testDumpedieWithTrace()
    {
        self::assertStringStartsWith(sprintf('%s[%d] -> %s()%s', __FILE__, 31, 'dd_trace', PHP_EOL), dd_trace());
    }

    /**
     * @param array $arguments
     */
    private function setExpectedArguments(array $arguments)
    {
        VarDumper::setHandler(function ($argument) use (&$arguments) {
            $expected = array_shift($arguments);
            Assert::assertSame($expected, $argument);
        });
    }
}