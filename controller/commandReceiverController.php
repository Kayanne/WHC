<?php
include_once('../model/iCommand.php');


if (isset($_POST['command']) && !empty($_POST['command'])) { // if input box not empty
    $raw = array_values(array_filter(explode(' ', trim($_POST["command"])))); // $raw[0] = command, $raw[1] = arg1, $raw[n] = arg[n]
    $command = array_slice($raw, 0, 1); // get the command
    $args = array_slice($raw, 1); // put the rest in an array
    if (sizeof($command) != 0 && !empty($raw[1])) { // If I have a command and at least 1 arg
        $raw[0] = preg_replace_callback('/(?<=-)[^\/]/', 'toUpper', strtolower($raw[0]));
        $raw[0] = preg_replace('/-/', '', $raw[0], 1); // im going for that solution but I know it is not ideal
        $class = '' . $raw[0] . 'Command';
        try {
            $cmd = new $class($args);
            if ($cmd instanceof iCommand) {
                $result = $cmd->executeCommand();
                echo json_encode(array('success' => 1, 'message' => $result)); // send the message to the front
            }
        } catch (Throwable  $e) {
            echo json_encode(array('success' => 2, 'message' => "Command not implemented"));
        }
    } else {
        echo json_encode(array('success' => 2, 'message' => "Wrong input: command or args can't be empty"));
    }
} else {
    echo json_encode(array('success' => 2, 'message' => "Wrong input: empty"));
}

function toUpper($matches) {
    return strtoupper($matches[0]);
}
?>