
<?php 
    header("Content-type: application/json; charset=utf-8");
    
    require "Controller/QueimadasController.php";

    $queimadas = new QueimadasController();


    if (isset($_GET['state']) && strcmp($_GET['state'],"") !== 0) {
        $estados = explode(",",$_GET['state']);
    } else {
        $estados = explode(",","acre,alagoas,amapa,amazonas,bahia,ceara,distrito_federal,espirito_santo,goias,maranhao,mato_grosso,mato_grosso_do_sul,minas_gerais,para,paraiba,parana,pernambuco,piaui,rio_de_janeiro,rio_grande_do_norte,rio_grande_do_sul,rondonia,roraima,santa_catarina,sao_paulo,sergipe,tocantins");
    }

    $json = "{\"LOCALE\" : {";
    foreach ($estados as $estado) {
        $queimadasCache = $queimadas->hasDateCache($queimadas->dataFormatada(),$estado);
    
        if ($queimadasCache) {
            $json .= $queimadas->cache($estado);
        } else {
            $jsonString = $queimadas->baixarDados($estado);
            $json .= $queimadas->cache($estado);
        }
        $json.=",";
    }
    $json=rtrim($json,",");
    $json.="}}";

    echo $json;

?>

