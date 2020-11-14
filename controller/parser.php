<?php
    include_once('../model/command.php');

    if (isset($_POST['command']) && !empty($_POST['command'])) { // if input box not empty
        $raw = array_values(array_filter(explode(' ', trim($_POST["command"])))); // $raw[0] = command, $raw[1] = arg1, $raw[n] = arg[n]
        $command = array_slice($raw, 0, 1); // get the command
        $args = array_slice($raw, 1);
        if (sizeof($command) != 0 && !empty($raw[1])) {
            $obj = new Command($raw[0], $args);
            $result = $obj->execute();
            echo json_encode(array('success' => 1, 'message' => $result, $obj));
        } else {
            echo json_encode(array('success' => 2, 'message' => "Wrong input: command or args can't be empty"));
        }
    } else {
        echo json_encode(array('success' => 2, 'message' => "Wrong input: empty"));
    }
?>