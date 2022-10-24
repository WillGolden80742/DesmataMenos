<?php 
    header("Content-type: application/json; charset=utf-8");  
    require 'Controller/Table.php';
    $headers = "Content-Type: text/html; charset=UTF-8\r\n";
    $content = $_POST['content'];
    $locale = $_POST['locale'];
    $mail = $_POST['mail'];
    if (strlen(new Table($content)) == 0) {
        echo "Envio com sucesso!";
		mail($mail,"Dado de ".$locale,"<center><h2>".$locale."</h2>".$content."</center>",$headers);
    } else {
        echo "Documento em formato incorreto!";
    }
?>