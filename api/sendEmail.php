<?php
    $headers = "Content-Type: text/html; charset=UTF-8\r\n";
    mail($_POST['mail'],"Dado de ".$_POST['locale'],$_POST['content'],$headers);
    echo $_POST['mail']."\n Dado de ".$_POST['locale'].$_POST['content'];
?>