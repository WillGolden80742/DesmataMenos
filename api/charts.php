<DOCTYPE html>
<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <canvas id="myChart" width="400" height="220"></canvas>
    <script>
        var desmataData = [0,0,0,0,0,0,0,0,0,0,0,0];
        var titles = ["","","","","","","","","","","",""];
        var UFTitle = "";
        uf();
        dadosMesAMes ();

        function dadosMesAMes () {
            $.ajax({
                url: 'queimadas.php?',
                method: 'GET',
                data: {state: "<?php echo $_GET['UF'] ?>" },
                dataType: 'html'
            }).done(function(text) { 
                var media = JSON.parse(text)['UF']["<?php echo $_GET['UF'] ?>"]['ANO']['Média*'];
                var table;
                var index = 0;
                Object.keys(media).forEach(function(item){ 
                    desmataData[index] = parseInt(media[item]);
                    titles[index] = item; 
                    index++;
                });
                desmataData.pop();
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
                UFTitle = UFTitle["UF"]['<?php echo $_GET['UF'] ?>'];
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
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
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