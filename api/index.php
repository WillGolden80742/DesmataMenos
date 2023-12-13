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
        <h3> 
        <h1>LOCALE</h1>
        <hr>
        <h3> 
            locale - Acesse todos os valores de todos estados regiões e biomas do brasil do Brasil
        </h3>  
        <hr>
        <h3>         
            Opção de estados : <br>           
        </h3>    
        <p>
            "" :
            "Todos estados"<br>
            "estado_acre" :
            "Acre" <br>    
            "estado_alagoas" :
            "Alagoas" <br>      
            "estado_amapa" :
            "Amapá" <br>    
            "estado_amazonas" :
            "Amazonas" <br>    
            "estado_bahia" :
            "Bahia" <br>    
            "estado_ceara" :
            "Ceará" <br>    
            "estado_distrito_federal" :
            "Distrito Federal" <br>    
            "estado_espirito_santo" :
            "Espírito Santo" <br>    
            "estado_goias" :
            "Goiás" <br>    
            "estado_maranhao" :
            "Maranhão" <br>     
            "estado_mato_grosso" :
            "Mato Grosso" <br>    
            "estado_mato_grosso_do_sul" :
            "Mato Grosso do Sul" <br>   
            "estado_minas_gerais" :
            "Minas Gerais" <br>   
            "estado_para" :
            "Pará" <br>    
            "estado_paraiba" :
            "Paraíba" <br>    
            "estado_parana" :
            "Paraná" <br>    
            "estado_pernambuco" :
            "Pernambuco" <br>    
            "estado_piaui" :
            "Piauí" <br>    
            "estado_rio_de_janeiro" :
            "Rio de Janeiro" <br>   
            "estado_rio_grande_do_norte" :
            "Rio Grande do Norte" <br>   
            "estado_rio_grande_do_sul" :
            "Rio Grande do Sul" <br>   
            "estado_rondonia" :
            "Rondônia" <br>    
            "estado_roraima" :
            "Roraima" <br>    
            "estado_santa_catarina" :
            "Santa Catarina" <br>    
            "estado_sao_paulo" :
            "São Paulo" <br>    
            "estado_sergipe" :
            "Sergipe" <br> 
            "estado_tocantins" :
            "Tocantins"<br> 
            "regiao_regiao_norte" :
            "Região Norte"<br>   
            "regiao_nordeste" :
            "Região Nordeste"<br>      
            "regiao_centro-oeste" :
            "Região Centro-oeste"<br>     
            "regiao_sul" :
            "Região Sul"<br>
            "regiao_sudeste" :
            "Região Sudeste"<br> 
            "regiao_amazonia_legal" :
            "Amazônia Legal"<br>  
            "regiao_vale_do_paraiba" :
            "Vale do Paraíba"<br>   
            "regiao_map" :
            "MAP"<br>              
            "bioma_caatinga" :
            "Caatinga"<br>        
            "bioma_cerrado" :
            "Cerrado"<br>    
            "bioma_pantanal" :
            "Pantanal"<br>   
            "bioma_pampa" :
            "Pampa"<br>
            "bioma_amazonia" :
            "Amazônia"<br> 
            "bioma_mata_atlantica" :
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