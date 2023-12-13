var urlCharts = "";
var estado = "";
var estadoPadrao = "estado_amazonas";
var ufJSON = "";
var moreAndLess = "";
var defaultFontSize = $('*').css('font-size');


function init (url) {
    select ();
    tabela ();
    $('#'+estadoPadrao+' path').css('fill:','#1a73e8');
    urlCharts = url+"api/charts.php";
}
 
// --------------- MÓDULO DE INICIALIZAÇÃO 

function dados() {
    select_dado = document.getElementById('select_dados').value;
    var estado = document.getElementById("select_state").value;

    if (select_dado == "tabela") {
        loading ();
        document.getElementById("desmatamentoTable").style.overflowY = "scroll";
        if (estado !== "") {
            document.getElementById('select_mail').disabled = false;
            tabela ();
        } else {
            tabelaTodosEstado();
            document.getElementById('select_mail').disabled = true;
        }
    } else if (select_dado == "grafico") {
        document.getElementById('select_mail').disabled = true;
        chart();
        document.getElementById("desmatamentoTable").style.overflowY = "hidden";
    }
    selectMapRefreshTable(estado,false);
}

function select () {
    $.ajax({
        url: 'api/locale.php',
        method: 'GET',
        dataType: 'html'
    }).done(function(text) { 
        var locale = JSON.parse(text);
        var options = "";
        var selected = "";
        document.getElementById("select_state").innerHTML = "";
        Object.keys(locale).forEach(function(localeItem) { 
            var tipo = ""; 
            switch (localeItem) {
                case "UF":
                    tipo="Estado";

                    break;
                case "REGIAO":
                    tipo="Região";
                    break;
                case "BIOMA":
                    tipo="Bioma";
                    break;
            }
            ufJSON = locale;
            Object.keys(locale[localeItem]).forEach(function(item) { 
                if (item == estadoPadrao) {
                    selected = "selected=\"selected\"";
                } else {
                    selected = "";
                }
                options += "<option value=\""+item+"\" id=\""+item+"\" "+selected+" >"+tipo+" : "+locale[localeItem][item]+"</option>";
            });
        });
        document.getElementById("select_state").innerHTML = options;
    });
}

// --------------------------- BAIXAR ARQUIVOS -----------------------------------------

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

// --------------------------- GRÁFICO --------------------------------------------

function chart () {
    estado = document.getElementById('select_state').value;
    document.getElementById("desmatamentoTable").innerHTML = "<iframe src=\""+urlCharts+"?state="+estado+"\" style=\"border:none;\" width=\"100%\" height=\"100%\" ></iframe> ";
}

function loading () {
    document.getElementById('desmatamentoTable').innerHTML="<center style=\"background-color:rgba(255,255,255,1);box-shadow:0px 0px 20px rgb(0,0,0,1)\" ><h1><img src=\"assets/images/loading.gif\" height=30px /></h1></center>";  
} 


function changeTableTextSize (value) {
    var fontSize = parseInt($('td').css('font-size').replace("px",""));
    if (value){
        document.getElementById('tableStyle').innerHTML="td, th { font-size:"+(fontSize+10)+"px;)}";
    } else {
        document.getElementById('tableStyle').innerHTML="td, th { font-size:"+(fontSize-10)+"px;)}";
    }
}

// --------------------------- TABELA --------------------------------------------


function setTable (table) {
    moreAndLess="<div class=\"buttonIncrease\" id=\"buttonIncrease\"><div id=\"more\" onclick=\"changeTableTextSize(true);\"></div><div id=\"less\" onclick=\"changeTableTextSize(false);\"></div></div>";
    document.getElementById('desmatamentoTable').innerHTML=moreAndLess+table;
}


function tabelaTodosEstado () {           
    var table = "";
    var thStyle = "style=\"background-color:rgba(65,76,107,0.25);\"";
    $.ajax({
        url: 'api/queimadas.php',
        method: 'GET',
        dataType: 'html'
    }).done(function(text) { 
        var json = JSON.parse(text);
        thead="";
        table += "<table></thead><tr><th "+thStyle +">Ano</th>#thead</tr></thead><tbody>#tbody</tbody></table>";
        tbody="";
        var ufLast;
        var maxArr = [], minArr = [];
        Object.keys(json['LOCALE']).forEach(function(uf){
                ufLast=uf;
                thead += "<th "+thStyle +" >"+uf+"</th>";
        }); 
        Object.keys(json['LOCALE'][ufLast]['ANO']).forEach(function(itemline){
            somaEstado = 0;
            tbody+="<tr><th "+thStyle +" >"+itemline+"</th>";
            tdColor="";
            countLine=0;
            Object.keys(json['LOCALE']).forEach(function(uf){
                total = json['LOCALE'][uf]['ANO'][itemline]['Total'].replace('-','');
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
                tbody+="<td "+tdColor+" id=\""+IDLine+"\"   >"+total+"</td>"; 
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
} 

function tabela () {
    try {
        estado = document.getElementById('select_state').value;
    } catch (error) {
        estado = estadoPadrao;
    } 
    $.ajax({
        url: 'api/queimadas.php?',
        method: 'GET',
        data: {state: estado},
        dataType: 'html'
    }).done(function(text) { 
        var text = JSON.parse(text)['LOCALE'][estado];
        var table = "<table >\n<thead>";
        var thStyle = "style=\"background-color:rgba(65,76,107,0.25);\"";
        var titleAno = text['ANO'];
        var firstAno = "";
        Object.keys(titleAno).forEach(function(item){ 
            firstAno=item;
        });
        table += "<tr><th "+thStyle+" >Ano</th>";
        Object.keys(titleAno[firstAno]).forEach(function(item){ 
            table += "<th "+thStyle+">"+item+"</th>";
        });
        table += "</tr>\n";
        table += "</thead>\n<tbody>";
        var maxArr = [], minArr = [];
        Object.keys(text['ANO']).forEach(function(item){
            var line = text['ANO'][item];
            table+="\n<tr>";
            table+="\n<th "+thStyle+"  >"+item+"</th>\n";
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
                table+="\n<td id=\""+IDLine+"\"  "+tdColor+" >"+line[itemline]+"</td>\n";
                countLine++;
            });
            table+="</tr>\n";
        });
        table+="</tbody></table>";
        setTable(table);
        for(let i = 0; i < maxArr.length; i++ ) {
            document.getElementById(maxArr[i]).style.backgroundColor = "rgba(255,0,0,0.25)";
            document.getElementById(minArr[i]).style.backgroundColor = "rgba(0,0,255,0.25)";                   
        }
    });
}

function selectMap (uf) {
    selectMapRefreshTable(uf,true);
}

function selectMapRefreshTable (uf,dado) {
    var selected = document.getElementById("select_state").value = uf;
    if (dado == true) {
        dados();
    }
    firstIteration=true;
    var tagEstilo = "//mapa-estilo";
    var styleMapa = (document.getElementById("styleTable").innerHTML).split(tagEstilo)[0];
    document.getElementById("styleTable").innerHTML=styleMapa;
    if (uf == "") {
        Object.keys(ufJSON['UF']).forEach(function(itemline){
            if(firstIteration) {
                firstIteration=false;
            }
            document.getElementById("styleTable").innerHTML+="#"+itemline+" path { fill:#1a73e8 !important; cursor:pointer }  #"+itemline+" .circle { fill:#2d3038 !important; cursor:pointer }";
        });
    } else {
        document.getElementById("styleTable").innerHTML+=tagEstilo;
        Object.keys(ufJSON['UF']).forEach(function(itemline){
            if(firstIteration) {
                firstIteration=false;
            }
            document.getElementById("styleTable").innerHTML+="#"+itemline+" path { fill:#414C6B !important; cursor:pointer  } #"+itemline+" .circle { fill:#2d3038 !important; cursor:pointer }";
        });   
        document.getElementById("styleTable").innerHTML+="#"+uf+" path, #"+uf+" .circle { fill:#1a73e8 !important; cursor:pointer }";
    }
}

//------------------ E-MAIL -------------------------------------

function mailFrame(value) {
    html = "<html> <head></head> <body>#body</body> </html>";
    if (value) {
        var locale = document.getElementById('select_state').value;
        document.getElementById("mailFrame").style.display = "block"; 
        document.getElementById("backDark").style.display = "block"; 
        document.getElementById("select_mail").value="";
        document.getElementById("tableMail").innerHTML=html.replace("#body",("<center><h2>"+getTitle(locale)+"</h2></center>"+document.getElementById("desmatamentoTable").innerHTML+"").replace(moreAndLess,""));
    } else {
        document.getElementById("backDark").style.display = "none"; 
        document.getElementById("mailFrame").style.display = "none";        
    }
}

function setUfJSON() {
    ufJSON = JSON.parse(text);
} 

function getUfJSON() {
    return ufJSON;
}

function getTitle (locale) {
    if(ufJSON['UF'][locale]) {
        return ufJSON['UF'][locale];
    } else if (ufJSON['REGIAO'][locale]) {
        return ufJSON['REGIAO'][locale];     
    } else if (ufJSON['BIOMA'][locale]) {
        return ufJSON['BIOMA'][locale];    
    }
}


function enviarEmail () {
    var locale = document.getElementById('select_state').value;
    var title = getTitle(locale);
    var content = (document.getElementById("desmatamentoTable").innerHTML).replace(moreAndLess,"");
    var mail = document.getElementById("email").value;
    if (IsEmail(mail)) {
        encaminhar(title,content,mail);
    } else {
        alert("E-mail invalido!");            
    }
}

function encaminhar(locale,content,mail) {
    $.ajax({
        url: 'api/sendEmail.php?',
        method: 'POST',
        data: {locale:locale,content:content,mail:mail},
        dataType: 'html'
    }).done(function(text) { 
        jsonMessage =  JSON.parse(text);
        if (jsonMessage[1] == true) {
            alert(jsonMessage[0]+" ("+mail+")");
        } else {
            alert(jsonMessage[0]+" ("+mail+")");
            location.reload();
        }  
        mailFrame(false);    
    });
}

function IsEmail(email){
    var er = new RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/);
    if( email == '' || !er.test(email) ) {
        return false;
    } else {
        return true;
    }
}  