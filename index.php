
<?php 

require 'global.php';

?>

<DOCTYPE html>
<html>
<head>
    <title>DesmataMenos</title>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.png">
    <style id='styleTable'>
        * {
            font-size: 18px;
            font-family:Arial, Helvetica, sans-serif;
        }
        @keyframes example {
            from {opacity:0;}
            to {opacity:1;}
        }
        * {
            animation-name: example;
            animation-duration:0.5s;
        }
        ::-webkit-scrollbar {
            width:15px;
            border-radius:10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background:rgb(40, 93, 51);
        }   

        ::-webkit-scrollbar-thumb {
            background:white;
            border-radius:10px;
            border:solid 1px rgba(0,0,0,0.25);
        }

        ::-webkit-scrollbar-track {
            border-radius:10px;
            box-shadow:inset 0px 0px 5px rgba(0,0,0,0.25);
        }

        ::-webkit-input-placeholder{
            color: rgb(40, 93, 51);
            font-weight: bold;
        }
        .desmatamento { 
            width:600px;
            height:300px;
            overflow-y:scroll;
            border:solid 2px rgb(40, 93, 51);
            border-radius:10px;   
        }
        td , center { border:solid 2px #cff }
        th, td {
            padding:5px;
        }

        .desmatamentoTable {
            width: 68%;
            border-radius:10px;
            border:solid 2px rgb(40, 93, 51);
            overflow-y: scroll;
        }

        .estateMap {
            background-color:white;
            width: 30%; 
            margin-left:10px;
            border-radius:10px;
            border:solid 2px rgb(40, 93, 51);
            display: inline-table;
        }

        .select_state, .select_save, .select_dados {
            border:solid 2px rgb(40, 93, 51);
            background: none;
            padding: 2px;
            border-radius:10px;
            box-shadow: 0px 0px 10px rgb(0 0 0 / 25%);
        }

        .desmatamentoTable, .estateMap {
            float: left;
            top: 0;
            height:90%;    
        }

        
        @media only screen and (max-width: 1080px) {
            body {
                padding-top:1%;
                padding-left:4%;
                padding-right:4%;
            }
            *{
                font-size: 42px;
            }
            .desmatamentoTable, .estateMap {
                margin:0;
                width: 100%;
                align-items: center;
                right: 0;
                left: 0;

            }
            .select_state {
                width: 100%;
                margin-bottom:20px;
            }
            .select_save, .select_dados {
                width:49%;
            }
            .select_save {
                float: right;
            }
            .estateMap {
                margin-top: 20px;
            }
            .desmatamentoTable, .estateMap {
                height:43%;
            }
        }
    </style>    

    <script>

        var desmataData = [];
        var titles = [];
        var mapas = "";
        var urlCharts = "";
        var estado = "";
        var estadoDefault = "sao_paulo";

        init ();
        function init () {
            document.getElementById("styleTable").innerHTML+=".desmatamentoTable { transition:0.5s; box-shadow:none; } .desmatamentoTable:hover { transition:0.5s; box-shadow: inset 0px 0px 20px rgb(0,0,0,1); }";
            desmataData = [0,0,0,0,0,0,0,0,0,0,0,0];
            titles = ["","","","","","","","","","","",""];
            mapas = ""; 
            select ();
            tabela ();
            <?php 
                $currentURL = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
                $arrURL = explode("/",$currentURL);
                $sizeArrURL = count ($arrURL)-1;
                $currentURL = str_replace($arrURL[$sizeArrURL],"",$currentURL);
            ?>
            urlCharts = "<?php echo $currentURL ?>"+"api/grafico";
        } 

        function setTable (table) {
            document.getElementById('desmatamentoTable').innerHTML=table;
        }

        function styleTableRemove (value) {
            styleTable = document.getElementById("styleTable").innerHTML;
            document.getElementById("styleTable").innerHTML=styleTable.replaceAll(".desmatamentoTable { transition:0.5s; box-shadow:none; } .desmatamentoTable:hover { transition:0.5s; box-shadow: inset 0px 0px 20px rgb(0,0,0,1); }",""); 
        }

        function dados(value) {
            select_dado = document.getElementById('select_dados').value;
            var estado = document.getElementById("select_state").value;
            if (select_dado == "tabela") {
                loading ();
                document.getElementById("desmatamentoTable").style.overflowY = "scroll";
                if (estado !== "") {
                    tabela ();
                } else {
                    tabelaTodosEstado();
                }
                document.getElementById("styleTable").innerHTML+=".desmatamentoTable { transition:0.5s; box-shadow:none; } .desmatamentoTable:hover { transition:0.5s; box-shadow: inset 0px 0px 20px rgb(0,0,0,1); }";
            } else if (select_dado == "grafico") {
                chart();
                document.getElementById("desmatamentoTable").style.overflowY = "hidden";
                styleTableRemove();
            }
            if (value) {
                mapRefresh(estado);
            }
        }

        function select () {
            $.ajax({
                url: 'api/uf',
                method: 'GET',
                dataType: 'html'
            }).done(function(text) { 
                var uf = JSON.parse(text)['UF'];
                var options = "";
                var selected = "";
                document.getElementById("select_state").innerHTML = "";
                Object.keys(uf).forEach(function(item){ 
                    if (item == estadoDefault) {
                        selected = "selected=\"selected\"";
                    } else {
                        selected = "";
                    }
                    options += "<option value=\""+item+"\" "+selected+" >"+"Estado : "+uf[item]+"</option>";
                });
                document.getElementById("select_state").innerHTML = options;
            });
        }

        function save () {
            format = document.getElementById('select_save').value;
            estado = null;
            if (format == "selecionado") {
                estado = document.getElementById("select_state").value;
            }
            download (estado);
        }

        function download (value) {
            $.ajax({
                url: 'api/queimadas.php?',
                method: 'GET',
                data: { state : value },
                dataType: 'html'
            }).done(function(text) { 
                file(text);
            });
        }

        function file (value) {
            var myBlob = new Blob([value], {type: "text/plain"});
            var url = window.URL.createObjectURL(myBlob);
            var anchor = document.createElement("a");
            anchor.href = url;
            var estado = "";
            if (document.getElementById("select_save").selectedIndex == 1) {
                estado = "_"+document.getElementById('select_state').value;
            } 
            anchor.download = "queimadas"+estado+".json";
            anchor.click();
            document.getElementById("select_save").selectedIndex = 0;
        }

        function chart () {
            estado = document.getElementById('select_state').value;
            document.getElementById("desmatamentoTable").innerHTML = "<iframe src=\""+urlCharts+"/locale/"+estado+"\" style=\"border:none;\" width=\"100%\" height=\"100%\" ></iframe> ";
        }

        function loading () {
            document.getElementById('desmatamentoTable').innerHTML="<center style=\"background-color:rgba(255,255,255,1);box-shadow:0px 0px 20px rgb(0,0,0,1)\" ><h1><img src=\"assets/images/loading.gif\" height=30px /></h1></center>";  
        } 

        function tabelaTodosEstado () {           
            var table = "";
            var thStyle = "style=\"background-color:rgba(40, 93, 51,0.25);\"";
            $.ajax({
                url: 'api/queimadas.php',
                method: 'GET',
                dataType: 'html'
            }).done(function(text) { 
                var json = JSON.parse(text);
                thead="";
                table += "<table></thead><tr><th "+thStyle +">Ano</th>#thead</tr></thead><tbody>#tbody</tbody></table>";
                tbody="";
                var maxArr = [], minArr = [];
                Object.keys(json['UF']).forEach(function(uf){
                        thead += "<th "+thStyle +">"+uf+"</th>";
                }); 
                Object.keys(json['UF']['acre']['ANO']).forEach(function(itemline){
                    somaEstado = 0;
                    tbody+="<tr><th "+thStyle +" >"+itemline+"</th>";
                    tdColor="";
                    countLine=0;
                    Object.keys(json['UF']).forEach(function(uf){
                        total = json['UF'][uf]['ANO'][itemline]['Total'].replace('-','');
                        var IDLine = "line"+(countLine++)+total;
                        if (itemline == "Máximo*") {
                            tdColor="style=\"background-color:rgba(255,0,0,0.25);\"";
                            maxArr.push(IDLine);
                        } else if (itemline == "Mínimo*"){    
                            tdColor="style=\"background-color:rgba(0,0,255,0.25);\""; 
                            minArr.push(IDLine);                     
                        } else if (itemline == "Média*"){   
                            tdColor="style=\"background-color:rgba(255,255,0,0.25);\"";                      
                        } 
                        tbody+="<td "+tdColor+" id=\""+IDLine+"\" >"+total+"</td>"; 
                    }); 
                    tbody+="</tr>";  
                });  
                table=table.replace("#thead",thead);
                table=table.replace("#tbody",tbody);
                setTable(table);
                for(let i = 0; i < maxArr.length; i++ ) {
                    document.getElementById(maxArr[i]).style.backgroundColor = "rgba(255,0,0,0.25)";
                    document.getElementById(minArr[i]).style.backgroundColor = "rgba(0,0,255,0.25)";                   
                }
            });                    
            //document.getElementById('desmatamentoTable').innerHTML="<center><h1>NO CONTENT</h1></center>";            
        } 

        function tabela () {
            try {
                estado = document.getElementById('select_state').value;
            } catch (error) {
                estado =estadoDefault;
            } 
            $.ajax({
                url: 'api/queimadas.php?',
                method: 'GET',
                data: {state: estado},
                dataType: 'html'
            }).done(function(text) { 
                var text = JSON.parse(text)['UF'][estado];
                var table = "<table>\n<thead>";
                var thStyle = "style=\"background-color:rgba(40, 93, 51,0.25);\"";
                title = text['ANO']['1998'];
                table += "<tr><th "+thStyle+">Ano</th>";
                Object.keys(title).forEach(function(item){ 
                    table += "<th "+thStyle+">"+item+"</th>";
                });
                table += "</tr>\n";
                table += "</thead>\n<tbody>";
                var maxArr = [], minArr = [];
                Object.keys(text['ANO']).forEach(function(item){
                    var line = text['ANO'][item];
                    table+="\n<tr>";
                    table+="\n<th "+thStyle+" >"+item+"</th>\n";
                    var selected = "";
                    if (item == "Média*") {
                        selected = "selected=\"selected\"";
                    } else {
                        selected = "";
                    }
                    var countLine = 0;
                    Object.keys(line).forEach(function(itemline){
                        var IDLine = "line"+countLine+line[itemline];
                        var tdColor = "";
                        if (item == "Máximo*") {
                            maxArr.push(IDLine);
                            tdColor="style=\"background-color:rgba(255,0,0,0.25);\"";
                        } else if (item == "Mínimo*"){
                            minArr.push(IDLine);      
                            tdColor="style=\"background-color:rgba(0,0,255,0.25);\"";                      
                        } else if (item == "Média*"){   
                            tdColor="style=\"background-color:rgba(255,255,0,0.25);\"";                      
                        } 
                        table+="\n<td id=\""+IDLine+"\" "+tdColor+" >"+line[itemline]+"</td>\n";
                        countLine++;
                    });
                    table+="</tr>\n";
                });
                table+="</tbody></table>";
                document.getElementById("desmatamentoTable").innerHTML=table;
                for(let i = 0; i < maxArr.length; i++ ) {
                    document.getElementById(maxArr[i]).style.backgroundColor = "rgba(255,0,0,0.25)";
                    document.getElementById(minArr[i]).style.backgroundColor = "rgba(0,0,255,0.25)";                   
                }
            });
        }

        function mapRefresh (value) {
            var url = "https://www.google.com/maps/embed?pb=";
            if (mapas == "") {
                $.ajax({
                    url: 'api/mapas.php?',
                    method: 'GET',
                    dataType: 'html'
                }).done(function(text) { 
                    mapas = JSON.parse(text)['UF'];
                });
            }  
            document.getElementById("estateMap").src=url+mapas[value];
        }

        
    </script>    

</head>    
<body>

    <div class="select_stateDIV">
        <p> 

            <select id="select_state" class="select_state" onchange="dados(true);">
            </select>

            <select id="select_dados" class="select_dados" onchange="dados();">
                <option value="tabela">Dado : Tabela</option>
                <option value="grafico">Dado : Gráfico</option>
            </select>

            <select id="select_save" class="select_save" onchange="save();">
                <option value="">Baixar tabela</option>
                <option value="selecionado">Estado selecionado</option>
                <option value="todos">Todos Estados</option>
            </select>
        </p>
    </div>

    <div id="desmatamentoTable" class="desmatamentoTable">
    </div>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15118263.739436049!2d-57.669303052141444!3d-22.316506948869396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce597d462f58ad%3A0x1e5241e2e17b7c17!2sS%C3%A3o%20Paulo!5e0!3m2!1spt-BR!2sbr!4v1665796765646!5m2!1spt-BR!2sbr" id="estateMap" class="estateMap" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 

    </body>
</html>