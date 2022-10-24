<?php   
    require 'Controller/Table.php';
    $headers = "Content-Type: text/html; charset=UTF-8\r\n";
    if (strlen(new Table($_POST['content'])) == 0) {
		mail($_POST['mail'],"Dado de ".$_POST['locale'],$content,$headers);
    }
?>