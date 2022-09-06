<?php 
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    require "vendor/autoload.php";
    require "EnvLoad/Environment.php";
    use EnvLoad\Environment; 
    Environment::load(__DIR__);
?>