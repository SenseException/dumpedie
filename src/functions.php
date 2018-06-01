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
    function dd_cond(bool $condition)
    {
        return new Condition($condition);
    }
}

if (!function_exists('dd_trace')) {
    /**
     * @return string
     */
    function dd_trace()
    {
        $trace = debug_backtrace();

        $output = '';
        foreach ($trace as $step) {
            $output .= sprintf('%s[%d] -> %s()%s', $step['file'], $step['line'], $step['function'], PHP_EOL);
        }

        return $output;
    }
}