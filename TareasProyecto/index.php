<?php
session_start();
    include_once("TareaController.php");  

    if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
    } else {
        $action = "loginView";  
    }

    $tarea = new TareaController();
    $tarea->$action();

    