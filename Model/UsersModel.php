<?php

    class UsersModel {
        function __construct() {
            $this->conFactory = new ConnectionFactory();
            $this->conFactoryPDO = new ConnectionFactoryPDO();            
        } 
  
    }
?>