<?php
    include 'Model/QueimadasModel.php';


    class QueimadasController {

        private $conFactory;
        private $queimadas;
        function __construct() {
            $this->conFactory = new ConnectionFactoryPDO();
            $this->queimadas = new QueimadasModel();
        }

        function criarCache ($locale,$json) {
            $this->queimadas->criarCache($locale,$json);
        }

        function verificarCache  ($date,$locale) {
            $result = $this->queimadas->verificarCache ($date,$locale);
            $hasCache = "";
            foreach ($result as $r) {
                $hasCache = $r;
                return $r;
            }
            if (strcmp($hasCache,"1")==0) {
                return true;
            } else {
                return false;  
            }
        }

        function cache ($locale) {
            $result = $this->queimadas->cache($locale);
            foreach ($result as $r) {
                return $r;
            }
        }

        function isLocale ($value) {
            $currentURL = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
            $arrURL = explode("/",$currentURL);
            $sizeArrURL = count ($arrURL)-1;
            $currentURL = str_replace($arrURL[$sizeArrURL],"",$currentURL);
            $arrayLocale = json_decode(file_get_contents($currentURL."locale.php"));
            $conjunto = "";
            foreach ($arrayLocale as $locale) {
                foreach ($locale as $l) {
                    $conjunto.=$l;
                }
            }
            $conjuntoSize = strlen($conjunto);
            $conjuntoSizeNew = strlen(str_replace($value,"",$conjunto));
            if ($conjuntoSize > $conjuntoSizeNew) {
                return true;
            } else {
                return false;
            }
        }

        function dataFormatada ()  {
            $datetime = new DateTime();
            $dataFormatada = $datetime->format('d/m/Y');
            return $dataFormatada;
        }


        function baixarDados ($locale) {
            $jsonString = "";
            $site = file_get_contents("https://terrabrasilis.dpi.inpe.br/queimadas/situacao-atual/media/".explode("_",$locale)[0]."/csv_estatisticas/historico_$locale.csv");
            $site = substr($site, 1);
            $site = rtrim($site);
            $site = (explode(chr(10),$site));
            $jsonString .= "\n\"$locale\" : {\n \"ANO\" : {";
            $count = 1;
            while ($count < sizeOf($site)) {
                $jsonString .= "\n    \"".explode(",",$site[$count])[0]."\"";
                $jsonString .= " : {\n";
                $countMonth = 1;
                foreach (explode(",",$site[0]) as $month)  {
                    $jsonString .= "      \"".$month."\" : ";
                    $jsonString .= "\"".explode(",",$site[$count])[$countMonth++]."\"";
                    $jsonString .= ",\n";
                }
                $jsonString = rtrim( $jsonString, ",\n");
                $count++;
                $jsonString .= "    },";
            }
            $jsonString = rtrim( $jsonString, ", ");
            $jsonString .= "\n  }\n}";

            $this->criarCache($locale,$jsonString);
        }        
    }
?>