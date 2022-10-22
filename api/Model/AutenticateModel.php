<?php

    include 'ConnectionFactory/ConnectionFactoryPDO.php';
    include 'Controller/StringT.php';
    session_start();

    class QueimadasModel {

        function __construct() {
            $this->conFactoryPDO = new ConnectionFactoryPDO();
        }

    }
?>