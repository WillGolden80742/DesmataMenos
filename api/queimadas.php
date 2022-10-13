
<?php 
    header("Content-type: application/json; charset=utf-8");
    $estado = $_GET['state'];
    $site = file_get_contents("https://queimadas.dgi.inpe.br/queimadas/portal-static/csv_estatisticas/historico_estado_$estado.csv");
    $site = substr($site, 1);
    $site = rtrim($site);
    $site = (explode(chr(10),$site));
    $jsonString = "{\n \"ANO\" : {";
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
    echo $jsonString;
?>

