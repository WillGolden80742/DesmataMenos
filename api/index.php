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
        <h1>Queimadas</h1>
        <hr>
        <h3> 
            queimadas/ - Acesse queimadas do Brasil inteiro
        </h3>
        <h3> 
            queimadas/locale/ - Acesse dados de queimadas filtrado por estado 
        </h3>
        <hr>
        <h1>Gráficos</h1>
        <hr>
        <h3> 
            grafico/ - Acesse grafico de queimadas do Brasil inteiro  
        </h3>
        <h3> 
            grafico/locale/ - Acesse grafico sobre queimadas filtrado por estado 
        </h3>
        <hr>
        <h3> 
        <h1>LOCALE</h1>
        <hr>
        <h3> 
            locale/ - Acesse todos os valores de todos estados regiões e biomas do brasil do Brasil
        </h3>  
        <hr>
        <h3>         
            Opção de estados : <br>           
        </h3>    
        <p>
            "" :
            "Todos estados"<br>
            "acre" :
            "Acre" <br>    
            "alagoas" :
            "Alagoas" <br>      
            "amapa" :
            "Amapá" <br>    
            "amazonas" :
            "Amazonas" <br>    
            "bahia" :
            "Bahia" <br>    
            "ceara" :
            "Ceará" <br>    
            "distrito_federal" :
            "Distrito Federal" <br>    
            "espirito_santo" :
            "Espírito Santo" <br>    
            "goias" :
            "Goiás" <br>    
            "maranhao" :
            "Maranhão" <br>     
            "mato_grosso" :
            "Mato Grosso" <br>    
            "mato_grosso_do_sul" :
            "Mato Grosso do Sul" <br>   
            "minas_gerais" :
            "Minas Gerais" <br>   
            "para" :
            "Pará" <br>    
            "paraiba" :
            "Paraíba" <br>    
            "parana" :
            "Paraná" <br>    
            "pernambuco" :
            "Pernambuco" <br>    
            "piaui" :
            "Piauí" <br>    
            "rio_de_janeiro" :
            "Rio de Janeiro" <br>   
            "rio_grande_do_norte" :
            "Rio Grande do Norte" <br>   
            "rio_grande_do_sul" :
            "Rio Grande do Sul" <br>   
            "rondonia" :
            "Rondônia" <br>    
            "roraima" :
            "Roraima" <br>    
            "santa_catarina" :
            "Santa Catarina" <br>    
            "sao_paulo" :
            "São Paulo" <br>    
            "sergipe" :
            "Sergipe" <br> 
            "tocantins" :
            "Tocantins"<br> 
            "norte" :
            "Região Norte"<br>   
            "nordeste" :
            "Região Nordeste"<br>      
            "centro-oeste" :
            "Região Centro-oeste"<br>     
            "sul" :
            "Região Sul"<br>
            "sudeste" :
            "Região Sudeste"<br> 
            "amazonia_legal" :
            "Amazônia Legal"<br>  
            "vale_do_paraiba" :
            "Vale do Paraíba"<br>   
            "map" :
            "MAP"<br>              
            "caatinga" :
            "Caatinga"<br>        
            "cerrado" :
            "Cerrado"<br>    
            "pantanal" :
            "Pantanal"<br>   
            "pampa" :
            "Pampa"<br>
            "amazonia" :
            "Amazônia"<br> 
            "mata_atlantica" :
            "Mata Atlântica"<br> 

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