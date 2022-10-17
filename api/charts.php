<?php  
    if (isset($_GET['dado']) && strcmp($_GET['dado'],"") !== 0){ 
        $dado = $_GET['dado'];
    } else {
        $dado = "Média*";
    }
    $state = $_GET['state'];
    if (strcmp($_GET['state'],'dado') == 0) {
        $state = "";
    } else {
        $state = $_GET['state'];
    }
?>
<DOCTYPE html>  
<html>
<head>
    <script src="../assets/js/chart.min.js"></script>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <canvas id="myChart" width="400" height="220"></canvas>
    <script>
        var desmataData = [0,0,0,0,0,0,0,0,0,0,0,0,0];
        var titles = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        var UFTitle = "";
        var tipoDado = "";
        dadosMesAMes ();
        uf();
        function dadosMesAMes () {
            $.ajax({
                url: 'queimadas.php',
                method: 'GET',
                data: {state: "<?php echo $state ?>" },
                dataType: 'html'
            }).done(function(text) { 
                var ufString = "<?php echo $state ?>";
                if (ufString !== "") {
                    var media = JSON.parse(text)['UF'][ufString]['ANO']['<?php echo $dado; ?>'];
                    var table;
                    var index = 0;
                    Object.keys(media).forEach(function(item){ 
                        desmataData[index] = parseInt(media[item]);
                        index++;
                    });
                } else {
                    var json = JSON.parse(text);
                    desmataData = [];
                    titles = [];
                    Object.keys(json['UF']['acre']['ANO']).forEach(function(itemline){
                        somaEstado = 0;
                        Object.keys(json['UF']).forEach(function(uf){
                            if (itemline != "Máximo*" && itemline != "Média*" && itemline != "Mínimo*") {
                                total = json['UF'][uf]['ANO'][itemline]['Total'].replace('-','');
                                somaEstado+=parseInt(total);
                            }
                        });    
                        desmataData.push(somaEstado);
                        titles.push(itemline);
                    });   
                    desmataData.pop();
                    desmataData.pop();
                    titles.pop();
                    titles.pop();
                    titles.pop();
                }
                desmataData.pop();
                chart(desmataData,titles);
            });
        }
        <?php 
            if (strcmp($_GET['state'],'dado') == 0) {
                $label = "total ano a ano km²";
            } else {
                $label = $dado;
            }
        ?>
        function uf () {
            $.ajax({
                url: 'uf.php?',
                method: 'GET',
                dataType: 'html'
            }).done(function(text) { 
                UFTitle = JSON.parse(text);
                UFTitle = UFTitle["UF"]['<?php echo $state ?>'];
                UFTitle += " (<?php echo $label ?>)";
            });
        }        
        function chart (desmataData, titles) {
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: titles,
                    datasets: [{
                        label: UFTitle,
                        data: desmataData,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    </script>
 
</head>    
<body>
</body>
</html>