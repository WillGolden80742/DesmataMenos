
<?php 
    header("Content-type: application/json; charset=utf-8");
    if (isset($_GET['state']) && strcmp($_GET['state'],"") !== 0) {
        $estados = explode(",",$_GET['state']);
    } else {
        $estados = explode(",","acre,alagoas,amapa,amazonas,bahia,ceara,distrito_federal,espirito_santo,goias,maranhao,mato_grosso,mato_grosso_do_sul,minas_gerais,para,paraiba,parana,pernambuco,piaui,rio_de_janeiro,rio_grande_do_norte,rio_grande_do_sul,rondonia,roraima,santa_catarina,sao_paulo,sergipe,tocantins");
    }
    $jsonString = "{\"UF\" : {";
    foreach ($estados as $estado) {
        $site = file_get_contents("https://queimadas.dgi.inpe.br/queimadas/portal-static/csv_estatisticas/historico_estado_$estado.csv");
        $site = substr($site, 1);
        $site = rtrim($site);
        $site = (explode(chr(10),$site));
        $jsonString .= "\n\"$estado\" : {\n \"ANO\" : {";
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
        $jsonString .= "\n  }\n},\n";
    }
    $jsonString = rtrim( $jsonString, ",\n");
    $jsonString .= "}}";
    echo $jsonString;
?>

