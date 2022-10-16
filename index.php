
<?php 

require 'global.php';

?>

<DOCTYPE html>
<html>
<head>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/js/jquery-3.6.0.min.js"></script>


    <style>
        * {
            font-size: 18px;
            font-family:Arial, Helvetica, sans-serif;
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
            width: 67%;
            border-radius:10px;
            border:solid 2px rgb(40, 93, 51);
            overflow-y: scroll;
        }

        .estateMap {
            background-color: rgb(40, 93, 51);
            width: 30%; 
            margin-left:10px;
            border-radius:10px;
            border:solid 2px rgb(40, 93, 51);
            display: inline-table;
        }

        .select_state, .select_save, .select_dados, .select_grafico_dados {
            color: #fff ;
            border:solid 2px rgb(40, 93, 51);
            background: none;
            background-color: rgb(40, 93, 51);
            padding: 2px;
            border-radius:10px;
            box-shadow: 0px 0px 10px rgb(0 0 0 / 25%);
        }

        .desmatamentoTable, .estateMap {
            float: left;
            top: 0;
            height:86%;    
        }
        .desmatamentoTable {
            box-shadow: inset 0px 0px 20px rgb(0,0,0,1);
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

        function dados(value) {
            select_dado = document.getElementById('select_dados').value;
            var estado = document.getElementById("select_state").value;
            if (select_dado == "tabela") {
                if (estado !== "") {
                    tabela ();
                } else {
                    document.getElementById('desmatamentoTable').innerHTML="<center><h1>NO CONTENT</h1></center>";
                }
                document.getElementById('select_grafico_dados').disabled = true;
            } else if (select_dado == "grafico") {
                chart();
                document.getElementById('select_grafico_dados').disabled = false;
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
                    options += "<option value=\""+item+"\" "+selected+" >"+uf[item]+"</option>";
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
            dado = document.getElementById('select_grafico_dados').value;
            document.getElementById("desmatamentoTable").innerHTML = "<iframe src=\""+urlCharts+"/locale/"+estado+"/dado/"+dado+"\" style=\"border:none;\" width=\"100%\" height=\"100%\" ></iframe> ";
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
                document.getElementById('select_grafico_dados').innerHTML="";
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
                    document.getElementById('select_grafico_dados').innerHTML+="<option value=\""+item+"\" "+selected+" >"+item+"</option>";
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
                console.log (maxArr);
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
            <label>Selecione o estado:</label>

            <select id="select_state" class="select_state" onchange="dados(true);">
            </select>

            <select id="select_dados" class="select_dados" onchange="dados();">
                <option value="tabela">Tabela</option>
                <option value="grafico">Gráfico</option>
            </select>

            <select id="select_grafico_dados" class="select_grafico_dados" onchange="dados();" disabled>
                
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