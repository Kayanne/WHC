<?php
include_once ('addCommand.php');
include_once('sortAscCommand.php');
include_once ('repoDescCommand.php');

interface iCommand
{
    public function executeCommand();
}

?>