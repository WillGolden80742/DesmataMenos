<?php 
    require "EnvLoad/Environment.php"; 
    $iniEnv = new Environment();
    $iniEnv->load(__DIR__);
    #setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    #date_default_timezone_set('America/Sao_Paulo');
    #show erros in php
    ini_set('display_errors', 1);
?>
