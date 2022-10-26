<?php 
    header("Content-type: application/json; charset=utf-8");  
    require 'Controller/Table.php';
    require 'Controller/QueimadasController.php';
    $headers = "Content-Type: text/html; charset=UTF-8\r\n";
    $content = $_POST['content'];
    $locale = $_POST['locale'];
    $mail = $_POST['mail'];
    $queimadas = new QueimadasController();
    if (strlen(new Table($content)) == 0 && $queimadas->pertenceAoLocale($locale)) {
        echo json_encode(Array("Envio com sucesso!",true));
		mail($mail,"Dado de ".$locale,"<center><h2>".$locale."</h2>".$content."</center>",$headers);
    } else {
        echo json_encode(Array("Documento em formato incorreto!".(new Table($content)))este,false));
    }
?>
