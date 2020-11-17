<?php


class sortAscCommand implements iCommand
{
    public $args = [];

    function __construct($arrayArg) {
        $this->args = $arrayArg;
    }

    /**
     * @return array
     */
    public function executeCommand() {
        sort($this->args);
        return $this->args;
    }
}