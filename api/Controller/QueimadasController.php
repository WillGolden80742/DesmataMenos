<?php
    include 'Model/QueimadasModel.php';

    class QueimadasController {
        function __construct() {
            $this->conFactory = new ConnectionFactoryPDO();
            $this->queimadas = new QueimadasModel();
        }

        function createCache ($locale,$json) {
            $this->queimadas->createCache($locale,$json);
        }

        function dateCache ($date,$locale) {
            $result = $this->queimadas->dateCache($date,$locale);
            foreach ($result as $r) {
                return $r;
            }
        }

        function cache ($locale) {
            $result = $this->queimadas->cache($locale);
            foreach ($result as $r) {
                return $r;
            }
        }
    }
?>