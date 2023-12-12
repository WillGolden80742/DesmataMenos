
<?php 
    header("Content-type: application/json; charset=utf-8");
    
    require "Controller/QueimadasController.php";

    $queimadas = new QueimadasController();


    if (isset($_GET['state']) && strcmp($_GET['state'],"") !== 0) {
        $locales = explode(",",$_GET['state']);
    } else {
        $locales = explode(",","estado_acre,estado_alagoas,estado_amapa,estado_amazonas,estado_bahia,estado_ceara,estado_distrito_federal,estado_espirito_santo,estado_goias,estado_maranhao,estado_mato_grosso,estado_mato_grosso_do_sul,estado_minas_gerais,estado_para,estado_paraiba,estado_parana,estado_pernambuco,estado_piaui,estado_rio_de_janeiro,estado_rio_grande_do_norte,estado_rio_grande_do_sul,estado_rondonia,estado_roraima,estado_santa_catarina,estado_sao_paulo,estado_sergipe,estado_tocantins");
    }

    $json = "{\"LOCALE\" : {";
    foreach ($locales as $locale) {
        $queimadasCache = $queimadas->verificarCache($queimadas->dataFormatada(),$locale);
    
        if ($queimadasCache) {
            $json .= $queimadas->cache($locale);
        } else {
            $jsonString = $queimadas->baixarDados($locale);
            $json .= $queimadas->cache($locale);
        }
        $json.=",";
    }
    
    $json=rtrim($json,",");
    $json.="}}";

    echo $json;

?>

