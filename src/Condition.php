<?php

namespace Budgegeria\Dumpedie;

class Condition
{
    /**
     * @var bool
     */
    private $condition;

    /**
     * @param bool $condition
     */
    public function __construct($condition)
    {
        $this->condition = (bool) $condition;
    }

    /**
     * @return bool
     */
    public function isVisible()
    {
        return $this->condition;
    }
}