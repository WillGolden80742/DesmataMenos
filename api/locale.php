
<?php 
    header("Content-type: application/json; charset=utf-8");
    $jsonString = "{\"UF\" : {                                             
            \"\":
            \"Todos estados\",                 
            \"acre\":
            \"Acre\" ,    
            \"alagoas\":
            \"Alagoas\" ,      
            \"amapa\":
            \"Amapá\" ,    
            \"amazonas\":
            \"Amazonas\" ,    
            \"bahia\":
            \"Bahia\" ,    
            \"ceara\":
            \"Ceará\" ,    
            \"distrito_federal\":
            \"Distrito Federal\" ,    
            \"espirito_santo\":
            \"Espírito Santo\" ,    
            \"goias\":
            \"Goiás\" ,    
            \"maranhao\":
            \"Maranhão\" ,     
            \"mato_grosso\":
            \"Mato Grosso\" ,    
            \"mato_grosso_do_sul\":
            \"Mato Grosso do Sul\" ,   
            \"minas_gerais\":
            \"Minas Gerais\" ,   
            \"para\":
            \"Pará\" ,    
            \"paraiba\":
            \"Paraíba\" ,    
            \"parana\":
            \"Paraná\" ,    
            \"pernambuco\":
            \"Pernambuco\" ,    
            \"piaui\":
            \"Piauí\" ,    
            \"rio_de_janeiro\":
            \"Rio de Janeiro\" ,   
            \"rio_grande_do_norte\":
            \"Rio Grande do Norte\" ,   
            \"rio_grande_do_sul\":
            \"Rio Grande do Sul\" ,   
            \"rondonia\":
            \"Rondônia\" ,    
            \"roraima\":
            \"Roraima\" ,    
            \"santa_catarina\":
            \"Santa Catarina\" ,    
            \"sao_paulo\":
            \"São Paulo\" ,    
            \"sergipe\":
            \"Sergipe\" , 
            \"tocantins\":
            \"Tocantins\"     
        }, 
        \"REGIAO\" : {
            \"norte\":
            \"Região Norte\" ,   
            \"nordeste\":
            \"Região Nordeste\" ,      
            \"centro-oeste\":
            \"Região Centro-oeste\" ,     
            \"sul\":
            \"Região Sul\" ,
            \"sudeste\":
            \"Região Sudeste\" , 
            \"amazonia_legal\":
            \"Amazônia Legal\" ,  
            \"vale_do_paraiba\":
            \"Vale do Paraíba\" ,   
            \"map\":
            \"MAP\"              
        }, 
        \"BIOMA\" : {
            \"caatinga\":
            \"Caatinga\" ,        
            \"cerrado\":
            \"Cerrado\" ,    
            \"pantanal\":
            \"Pantanal\" ,   
            \"pampa\":
            \"Pampa\",
            \"amazonia\":
            \"Amazônia\", 
            \"mata_atlantica\":
            \"Mata Atlântica\" 
        }
    }";
    echo $jsonString;
    
?>
