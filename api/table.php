
<DOCTYPE html>
<html>
    <head>
        <script src="../assets/js/jquery-3.6.0.min.js"></script>
        <script>
                tabela (); 
                function tabela () {
                    try {
                        estado = "<?php echo $_GET['locale']; ?>";
                    } catch (error) {
                        estado =estadoDefault;
                    } 
                    $.ajax({
                        url: 'queimadas.php?',
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
                        for(let i = 0; i < maxArr.length; i++ ) {
                            document.getElementById(maxArr[i]).style.backgroundColor = "rgba(255,0,0,0.25)";
                            document.getElementById(minArr[i]).style.backgroundColor = "rgba(0,0,255,0.25)";                   
                        }
                        sendEmail ("<center> <h2><?php echo $_GET['locale']; ?></h2>"+table+" </center>");
                    });
                } 
                function sendEmail (value) {
                    $.ajax({
                        url: 'sendEmail.php?',
                        method: 'POST',
                        data: {locale: '<?php echo $_GET['locale']; ?>',content:value,mail:<?php echo $_GET['mail']; ?>},
                        dataType: 'html'
                    }).done(function(text) { 
                        console.log("Enviado com sucesso!");
                    });
                }
        </script>
    </head>    
    <body>
        <div id="allContent">
            <center>   
                <h2><?php echo $_GET['locale']; ?></h2>     
                <div id="desmatamentoTable">
                </div>
             </center>
        </div>
    </body>
</html>
