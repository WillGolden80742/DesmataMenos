<?php 
    require "EnvLoad/Environment.php"; 
    $iniEnv = new Environment();
    $iniEnv->load(__DIR__);
    date_default_timezone_set('America/Sao_Paulo');
    #show erros in php
    ini_set('display_errors', 1);
?>
