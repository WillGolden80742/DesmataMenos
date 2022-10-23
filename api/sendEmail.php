<?php
    $headers = "Content-Type: text/html; charset=UTF-8\r\n";
    $locale = "";
    if (isset($_POST['locale'])) {
        $locale=$_POST['locale'];
    }
    mail($_POST['mail'],"Dado de ".$locale,$_POST['content'],$headers);
?>