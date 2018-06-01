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
    public function __construct(bool $condition)
    {
        $this->condition = $condition;
    }

    /**
     * @return bool
     */
    public function isVisible()
    {
        return $this->condition;
    }
}