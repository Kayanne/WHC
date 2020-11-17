<?php


class addCommand implements iCommand
{
    public $args = [];

    function __construct($arrayArg) {
        $this->args = $arrayArg;
    }

    /**
     * @return float|int
     */
    public function executeCommand() {
        return array_sum($this->args);
    }
}