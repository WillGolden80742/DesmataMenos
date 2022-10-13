<DOCTYPE html>
<html>
<head>
    <style>
        .weather {
            width: 300px;
            height: 200px;
            overflow-y: scroll;

        }
        ::-webkit-scrollbar {
            width:10px;
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

    </style>    
</head>    
<body>

<?php 

    include 'Controller/Sessions.php';

    use AdinanCenci\Climatempo\Climatempo;

    $token      = '9cf8b1215f87d7ac0b17a3df8062e771';
    $id         = 3477; /*São paulo*/

    $climatempo = new Climatempo($token);

    $previsao   = $climatempo->fifteenDays($id);
    echo "<div class='weather'>";
    foreach ($previsao->days as $dia) {
        echo 
        "Cidade: <b>$previsao->city ($dia->date)</b>: <br>
        Temp. mínima: $dia->minTemp °C <br>
        Temp. máxima: $dia->maxTemp °C <br>
        Probab. de precipitação: $dia->pop % <br>
        Precipitação: $dia->mm mm <br>
        Frase: $dia->textPt <hr>";
    }
    echo "</div>"
?>

</body>
</html>