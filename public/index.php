<?php
if (strpos($_SERVER['REQUEST_URI'], 'index.php/ajax')) { // if it's the AJAX call
    include_once  ('../controller/commandReceiverController.php');
} else {
    include_once ('../controller/indexController.php');
}
?>