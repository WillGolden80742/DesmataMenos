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

        function hasDateCache ($date,$locale) {
            $result = $this->queimadas->hasDateCache($date,$locale);
            foreach ($result as $r) {
                return $r;
            }
            if (strcmp($r,"1")==0) {
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

        function isAtLocale ($value) {
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

        function formatedDate ()  {
            $datetime = new DateTime();
            $formatedDate = $datetime->format('d/m/Y');
            return $formatedDate;
        }


        function downloadData ($locale) {
            $jsonString = "";

            $site = file_get_contents("https://queimadas.dgi.inpe.br/queimadas/portal-static/csv_estatisticas/historico_estado_$locale.csv");
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

            $this->createCache($locale,$jsonString);
        }        
    }
?>