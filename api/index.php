<DOCTYPE html>
<html>
<head>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            color:rgb(50,50,50);
        }
        .apiTutorial {
            padding-left:7%;
            padding-right:7%;
            margin-left:15%;
            margin-right:15%;
            border:solid 2px rgb(122, 122,122);
            box-shadow: 0px 0px 10px rgba(0,0,0,0.25);
            word-break:break-all;
        }
    </style>
</head>    
<body>
    <div class="apiTutorial"> 
        <h1>Bem vindo</h1>
    </div>
    <?php 

        $currentDirectory = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
        $arrDirectory = explode("/",$currentDirectory);
        $sizeArrDirectory = count ($arrDirectory)-1;
        $currentDirectory = str_replace($arrDirectory[$sizeArrDirectory],"",$currentDirectory);

        $urlArr = explode("/",$_GET['url']);
        $count = 0;
        
        $urlArr[0]=strtolower($urlArr[0]);
        $urlArr[1]=strtolower($urlArr[1]);
        $urlArr[2]=strtolower($urlArr[2]);
        $urlArr[3]=strtolower($urlArr[3]);

        switch ($urlArr[0]) {
            case "grafico" :
                $urlArr[0]='charts';    
                redirect($currentDirectory,$urlArr);
                break;  
            case "locale" :
                $urlArr[0]='locale';    
                redirect($currentDirectory,$urlArr);
                break;    
            case "queimadas" :
                redirect($currentDirectory,$urlArr);     
                break;   
            case "mapas" :
                redirect($currentDirectory,$urlArr);     
                break;                 
        }

        function redirect ($directory,$url) {
            $urlStr="";
            $urlStr=$url[0].".php?state=".$url[2];
            header("Location: $directory".$urlStr);
        }

    ?>
</body>   
</html>