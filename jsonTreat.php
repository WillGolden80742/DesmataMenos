
<?php 
    header("Content-type: application/json; charset=utf-8");
    $site = file_get_contents("https://queimadas.dgi.inpe.br/home/download?id=focos_brasil&time=48h&outputFormat=json&utm_source=landing-page&utm_medium=landing-page&utm_campaign=dados-abertos&utm_content=focos_brasil_48h");
    $arrQueimada = json_decode($site);
    foreach ($arrQueimada->features as $aQ){
        $jsonQueimada.="".json_encode($aQ->properties).",\n\n";
    }
    echo $jsonQueimada;
    #echo $site;
?>

