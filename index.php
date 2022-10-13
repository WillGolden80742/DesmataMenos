<DOCTYPE html>
<html>
<head>
    <script src="assets/js/javascript.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/jquery.js"></script>
    <link rel="stylesheet" href="assets/css/styles.css">

    <script>
        queimadas();
        function queimadas () {
            var estado = "";
            try {
                estado = document.getElementById('select_estado').value;
            } catch (error) {
                estado = "sao_paulo";
            } 
            $.ajax({
                url: 'api/queimadas.php?',
                method: 'GET',
                data: {state: estado},
                dataType: 'html'
            }).done(function(text) { 
                var text = JSON.parse(text);
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
    </script>    
</head>    
<body>

<?php 

    include 'Controller/Sessions.php';

    
?>
    <div class="select_estadoDIV">
        <p> 
            <label>Selecione o estado:</label>
            <select id="select_estado" class="select" onchange="queimadas();">
            <option value="">Nenhum selecionado</option>
            <option value="acre">Acre</option><option value="alagoas">Alagoas</option><option value="amapa">Amapá</option><option value="amazonas">Amazonas</option>
            <option value="bahia">Bahia</option><option value="ceara">Ceará</option><option value="distrito_federal">Distrito Federal</option>
            <option value="espirito_santo">Espírito Santo</option><option value="goias">Goiás</option><option value="maranhao">Maranhão</option>
            <option value="mato_grosso">Mato Grosso</option><option value="mato_grosso_do_sul">Mato Grosso do Sul</option>
            <option value="minas_gerais">Minas Gerais</option><option value="para">Pará</option><option value="paraiba">Paraíba</option><option value="parana">Paraná</option>
            <option value="pernambuco">Pernambuco</option><option value="piaui">Piauí</option><option value="rio_de_janeiro">Rio de Janeiro</option>
            <option value="rio_grande_do_norte">Rio Grande do Norte</option><option value="rio_grande_do_sul">Rio Grande do Sul</option>
            <option value="rondonia">Rondônia</option><option value="roraima">Roraima</option><option value="santa_catarina">Santa Catarina</option>
            <option value="sao_paulo" selected="selected">São Paulo</option><option value="sergipe">Sergipe</option>
            <option value="tocantins">Tocantins</option>
            </select>
        </p>
    </div>

    <div id="desmatamentoTable" class="desmatamentoTable">

    </div>
</body>
</html>