
<?php 
    header("Content-type: application/json; charset=utf-8");
    $jsonString = "{\"UF\" : {                                             
            \"\":
            \"Todos estados\",                 
            \"estado_acre\":
            \"Acre\" ,    
            \"estado_alagoas\":
            \"Alagoas\" ,      
            \"estado_amapa\":
            \"Amapá\" ,    
            \"estado_amazonas\":
            \"Amazonas\" ,    
            \"estado_bahia\":
            \"Bahia\" ,    
            \"estado_ceara\":
            \"Ceará\" ,    
            \"estado_distrito_federal\":
            \"Distrito Federal\" ,    
            \"estado_espirito_santo\":
            \"Espírito Santo\" ,    
            \"estado_goias\":
            \"Goiás\" ,    
            \"estado_maranhao\":
            \"Maranhão\" ,     
            \"estado_mato_grosso\":
            \"Mato Grosso\" ,    
            \"estado_mato_grosso_do_sul\":
            \"Mato Grosso do Sul\" ,   
            \"estado_minas_gerais\":
            \"Minas Gerais\" ,   
            \"estado_para\":
            \"Pará\" ,    
            \"estado_paraiba\":
            \"Paraíba\" ,    
            \"estado_parana\":
            \"Paraná\" ,    
            \"estado_pernambuco\":
            \"Pernambuco\" ,    
            \"estado_piaui\":
            \"Piauí\" ,    
            \"estado_rio_de_janeiro\":
            \"Rio de Janeiro\" ,   
            \"estado_rio_grande_do_norte\":
            \"Rio Grande do Norte\" ,   
            \"estado_rio_grande_do_sul\":
            \"Rio Grande do Sul\" ,   
            \"estado_rondonia\":
            \"Rondônia\" ,    
            \"estado_roraima\":
            \"Roraima\" ,    
            \"estado_santa_catarina\":
            \"Santa Catarina\" ,    
            \"estado_sao_paulo\":
            \"São Paulo\" ,    
            \"estado_sergipe\":
            \"Sergipe\" , 
            \"estado_tocantins\":
            \"Tocantins\"     
        }, 
        \"REGIAO\" : {
            \"regiao_norte\":
            \"Região Norte\" ,   
            \"regiao_nordeste\":
            \"Região Nordeste\" ,      
            \"regiao_centro-oeste\":
            \"Região Centro-oeste\" ,     
            \"regiao_sul\":
            \"Região Sul\" ,
            \"regiao_sudeste\":
            \"Região Sudeste\" , 
            \"regiao_amazonia_legal\":
            \"Amazônia Legal\" ,  
            \"regiao_vale_do_paraiba\":
            \"Vale do Paraíba\" ,   
            \"regiao_map\":
            \"MAP\"              
        }, 
        \"BIOMA\" : {
            \"bioma_caatinga\":
            \"Caatinga\" ,        
            \"bioma_cerrado\":
            \"Cerrado\" ,    
            \"bioma_pantanal\":
            \"Pantanal\" ,   
            \"bioma_pampa\":
            \"Pampa\",
            \"bioma_amazonia\":
            \"Amazônia\", 
            \"bioma_mata_atlantica\":
            \"Mata Atlântica\" 
        }
    }";
    echo $jsonString;
?>
