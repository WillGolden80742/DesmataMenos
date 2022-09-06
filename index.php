<?php 
    include 'Controller/Sessions.php';
    include 'Controller/HTMLFilter.php';
?>
<DOCTYPE html>
<html>
<head>
</head>    
<body>
<?php
    $session = new Sessions();
    use Goutte\Client;
    use Symfony\Component\HttpClient\HttpClient;
    $filter = new HTMLFilter("");
    $site = file_get_contents("http://www.obt.inpe.br/OBT/assuntos/programas/amazonia/prodes");
    $update = "<center>(*".$filter->getContentHTML($site,"Atualizado",")")."</center>";
    $site = $filter->getContentHTMLByTag($site,"table class=\"plain");
    echo $site;
    echo $update;

?>


</body>
</html>

