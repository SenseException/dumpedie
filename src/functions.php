<?php

use Budgegeria\Dumpedie\Condition;
use Symfony\Component\VarDumper\VarDumper;

if (!function_exists('dumpedie')) {
    /**
     * @param mixed[] ...$arguments
     */
    function dumpedie(...$arguments)
    {
        $isVisible = true;
        foreach ($arguments as $argument) {
            if ($argument instanceof Condition) {
                $isVisible = $argument->isVisible();
                continue;
            }

            if (true === $isVisible) {
                VarDumper::dump($argument);
            }
        }
    }
}

if (!function_exists('dd_cond')) {
    /**
     * @param bool $condition
     * @return Condition
     */
    function dd_cond($condition)
    {
        return new Condition($condition);
    }
}