<DOCTYPE html>
<html>
<head>
    <script src="assets/js/javascript.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/jquery.js"></script>
    <link rel="stylesheet" href="assets/css/styles.css">

    <style>
        * {
            font-size: 24px;
        }
        ::-webkit-scrollbar {
            width:15px;
            border-radius:10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background:#285d33;
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
            color: #285d33;
            font-weight: bold;
        }
        .desmatamento { 
            width:600px;
            height:300px;
            overflow-y:scroll;
            border:solid 2px #285d33;
            border-radius:10px;   
        }
        td , center { border:solid 2px #cff }

        .desmatamentoTable {
            width: 61%;
            border-radius:10px;
            border:solid 2px #285d33;
            overflow-y: scroll;
        }


        .estateMap {
            background-color: #285d33;
            width:35%; 
            margin-left:10px;
            border-radius:10px;
            border:solid 2px #285d33;
            display: inline-table;
        }


        .select_state, .select_save {
            border:solid 2px #285d33;
            background: none;
            background-color: #285d33;
            padding: 2px;
            border-radius:10px;
        }

        .desmatamentoTable, .estateMap {
            float: left;
            top: 0;
            height:90%;
        }
        
    </style>    

    <script>
        var mapas = "";
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
                data: { state : value},
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
            anchor.download = "queimadas.json";
            anchor.click();
            document.getElementById("select_save").selectedIndex = 0;
        }
        queimadas();
        function queimadas () {
            var estado = "";
            try {
                estado = document.getElementById('select_state').value;
                mapRefresh(estado);
            } catch (error) {
                estado = "sao_paulo";
            } 
            $.ajax({
                url: 'api/queimadas.php?',
                method: 'GET',
                data: {state: estado},
                dataType: 'html'
            }).done(function(text) { 
                var text = JSON.parse(text)['UF'][estado];
                var table = "<table>\n<thead>";
                title = text['ANO']['1998'];
                table += "<tr><th>Ano</th>";
                Object.keys(title).forEach(function(item){ 
                    table += "<th>"+item+"</th>";
                });
                table += "</tr>\n";
                table += "</thead>\n<tbody>";
                Object.keys(text['ANO']).forEach(function(item){
                    var line = text['ANO'][item];
                    table+="\n<tr>";
                    table+="\n<th>"+item+"</th>\n";
                    Object.keys(line).forEach(function(itemline){
                        table+="\n<td>"+line[itemline]+"</td>\n";
                    });
                    table+="</tr>\n";
                });
                table+="</tbody></table>";
                document.getElementById("desmatamentoTable").innerHTML=table;
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

<?php 

    include 'Controller/Sessions.php';

    
?>
    <div class="select_stateDIV">
        <p> 
            <label>Selecione o estado:</label>
            <select id="select_state" class="select_state" onchange="queimadas();">
                <option value="">Nenhum selecionado</option>
                <option value="acre">Acre</option>
                <option value="alagoas">Alagoas</option>
                <option value="amapa">Amapá</option>
                <option value="amazonas">Amazonas</option>
                <option value="bahia">Bahia</option>
                <option value="ceara">Ceará</option>
                <option value="distrito_federal">Distrito Federal</option>
                <option value="espirito_santo">Espírito Santo</option>
                <option value="goias">Goiás</option>
                <option value="maranhao">Maranhão</option>
                <option value="mato_grosso">Mato Grosso</option>
                <option value="mato_grosso_do_sul">Mato Grosso do Sul</option>
                <option value="minas_gerais">Minas Gerais</option>
                <option value="para">Pará</option>
                <option value="paraiba">Paraíba</option>
                <option value="parana">Paraná</option>
                <option value="pernambuco">Pernambuco</option>
                <option value="piaui">Piauí</option>
                <option value="rio_de_janeiro">Rio de Janeiro</option>
                <option value="rio_grande_do_norte">Rio Grande do Norte</option>
                <option value="rio_grande_do_sul">Rio Grande do Sul</option>
                <option value="rondonia">Rondônia</option>
                <option value="roraima">Roraima</option>
                <option value="santa_catarina">Santa Catarina</option>
                <option value="sao_paulo" selected="selected">São Paulo</option>
                <option value="sergipe">Sergipe</option>
                <option value="tocantins">Tocantins</option>
            </select>

            <select id="select_save" class="select_save" onchange="save();">
                <option value="">Baixar tabela</option>
                <option value="selecionado">estado selecionado</option>
                <option value="todos">todos estados</option>
            </select>
        </p>
    </div>

    <div id="desmatamentoTable" class="desmatamentoTable">
    </div>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15118263.739436049!2d-57.669303052141444!3d-22.316506948869396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce597d462f58ad%3A0x1e5241e2e17b7c17!2sS%C3%A3o%20Paulo!5e0!3m2!1spt-BR!2sbr!4v1665796765646!5m2!1spt-BR!2sbr" id="estateMap" class="estateMap" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
    </body>
</html>