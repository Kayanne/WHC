<?php
if ($_SERVER['REQUEST_URI'] == '/webHosting/') { //default route
    include_once ('../controller/indexController.php');
}
elseif ($_SERVER['REQUEST_URI'] == '/webHosting/public/index.php/ajax') { // if it's the AJAX call
    include_once  ('../controller/commandReceiverController.php');
}
?>