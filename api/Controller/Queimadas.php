<?php
    include 'Model/QueimadasModel.php';
    
    class QueimadasController {
        function __construct() {
            $this->authModel = new QueimadasModel();
            $this->conFactoryPDO = new ConnectionFactoryPDO();
        }

    }
?>