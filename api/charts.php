<?php  
    $state = $_GET['state'];

    if (isset($_GET['res'])) {
        $resolution = explode("x",$_GET['res']);
    } else {
        $resolution = [100,55];        
    }

?>
<DOCTYPE html>  
<html>
<head>
    <script src="../assets/js/chart.min.js"></script>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <canvas id="myChart" width=<?php echo $resolution[0]; ?> height=<?php echo $resolution[1]; ?>></canvas>
    <style>
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
            background:rgb(255,255, 255);
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
            color: rgb(255,255, 255);
            font-weight: bold;
        }       
        
    </style>
    <script>
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
                var json = JSON.parse(text);
                var desmataData = [];
                var titles = [];
                var firstUF = "";
                Object.keys(json['UF']).forEach(function(uf){
                    firstUF = uf;
                    return true;
                });   
                Object.keys(json['UF'][firstUF]['ANO']).forEach(function(itemline){
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
                desmataData.pop();
                titles.pop();
                titles.pop();
                titles.pop();
                chart(desmataData,titles);
            });
        }   
        function uf () {
            $.ajax({
                url: 'uf.php?',
                method: 'GET',
                dataType: 'html'
            }).done(function(text) { 
                UFTitle = JSON.parse(text);
                UFTitle = '<?php echo $state; ?>';
                UFTitle += " (total ano a ano km²)";
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
            document.getElementById("loading").style.display = "none";
        }
    </script>
 
</head>    
<body>
    <center id='loading' ><h1><img src="../assets/images/loading.gif" height=30px /></h1></center>
</body>
</html>