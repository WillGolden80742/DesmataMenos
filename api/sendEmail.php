<?php
    $headers = "Content-Type: text/html; charset=UTF-8\r\n";
    $locale = "";
    mail($_POST['mail'],"Dado de ".$_POST['locale'],$_POST['content'],$headers);
?>