<DOCTYPE html>
<html>
<head>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            color:rgb(50,50,50);
        }
        .apiTutorial {
            padding-left:100px;
            padding-right:100px;
            margin-left:200px;
            margin-right:200px;
            border:solid 2px rgb(122, 122,122);
            box-shadow: 0px 0px 10px rgba(0,0,0,0.25);
        }
    </style>
</head>    
<body>
    <div class="apiTutorial"> 
        <h1>Queimadas</h1>
        <hr>
        <h3> 
            queimadas/ - Acesse todos dados de queimadas  
        </h3>
        <h3> 
            queimadas/locale/ - Acesse dados de queimadas filtrados por estados 
        </h3>
        <hr>
        <h1>Gráficos</h1>
        <hr>
        <h3> 
            grafico/ - Acesse todos grafico de queimadas  
        </h3>
        <h3> 
            grafico/locale/ - Acesse dados de grafico filtrados por estados 
        </h3>
        <hr>
        <h3> 
        <h1>UF</h1>
        <hr>
        <h3> 
            uf/ - Acesse os valores de todas unidades federativas do Brasil
        </h3>
        <h1>Mapas</h1>
        <hr>
        <h3> 
            mapas/ - Acesse os valores de url de mapas das unidades federativas
        </h3>    
        <hr>
        <h3>         
            Opções de estado : <br>           
        </h3>    
        <p>
                "":
                "Todos estados"<br>
                "acre":
                "Acre" <br>    
                "alagoas":
                "Alagoas" <br>      
                "amapa":
                "Amapá" <br>    
                "amazonas":
                "Amazonas" <br>    
                "bahia":
                "Bahia" <br>    
                "ceara":
                "Ceará" <br>    
                "distrito_federal":
                "Distrito Federal" <br>    
                "espirito_santo":
                "Espírito Santo" <br>    
                "goias":
                "Goiás" <br>    
                "maranhao":
                "Maranhão" <br>     
                "mato_grosso":
                "Mato Grosso" <br>    
                "mato_grosso_do_sul":
                "Mato Grosso do Sul" <br>   
                "minas_gerais":
                "Minas Gerais" <br>   
                "para":
                "Pará" <br>    
                "paraiba":
                "Paraíba" <br>    
                "parana":
                "Paraná" <br>    
                "pernambuco":
                "Pernambuco" <br>    
                "piaui":
                "Piauí" <br>    
                "rio_de_janeiro":
                "Rio de Janeiro" <br>   
                "rio_grande_do_norte":
                "Rio Grande do Norte" <br>   
                "rio_grande_do_sul":
                "Rio Grande do Sul" <br>   
                "rondonia":
                "Rondônia" <br>    
                "roraima":
                "Roraima" <br>    
                "santa_catarina":
                "Santa Catarina" <br>    
                "sao_paulo":
                "São Paulo" <br>    
                "sergipe":
                "Sergipe" <br> 
                "tocantins":
                "Tocantins" 
        </p>
        <h4> Exemplo - queimadas/locale/sao_paulo </h4>
    </div>
    <?php 

        $currentDirectory = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
        $arrDirectory = explode("/",$currentDirectory);
        $sizeArrDirectory = count ($arrDirectory)-1;
        $currentDirectory = str_replace($arrDirectory[$sizeArrDirectory],"",$currentDirectory);

        $urlArr = explode("/",$_GET['url']);
        $count = 0;

        foreach ($urlArr  as $url) {
            $urlArr[$count]=strtolower($url);
            $count++;
        }

        switch ($urlArr[0]) {
            case "grafico":
                $urlArr[0]='charts';    
                redirect($currentDirectory,$urlArr);
                break;  
            case "uf":
                $urlArr[0]='uf';    
                redirect($currentDirectory,$urlArr);
                break;    
            case "queimadas":
                redirect($currentDirectory,$urlArr);     
                break;   
            case "mapas":
                    redirect($currentDirectory,$urlArr);     
                    break;                 
        }

        function redirect ($directory,$url) {
            $urlStr="";
            $urlStr=$url[0].".php?state=".$url[2]."&dado=$url[4]";
            header("Location: $directory".$urlStr);
        }

    ?>
</body>   
</html>