<?php
    include 'Model/UsersModel.php';

    class UsersController {
        function __construct() {
            $this->conFactory = new ConnectionFactoryPDO();
            $this->user = new UsersModel();
        } 

    }
?>