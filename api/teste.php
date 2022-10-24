<DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
    </head>    
    <body>
        <form action="sendEmail.php" method="post">
            <label for="fname">Email:</label>
            <input type="text" id="fname" name="mail"><br><br>
            <label for="lname">Local:</label>
            <input type="text" id="lname" name="locale"><br><br>
            <label for="lname">conteudo:</label>
            <input type="text" id="lname" name="content"><br><br>
            <input type="submit" value="Submit">
        </form>
    </body>
    <?php 
        require 'Controller/QueimadasController.php';
        $queimadas = new QueimadasController();
        if ( $queimadas->pertenceAoLocale("Alagoas")) {
            echo "Wolol";
        } else {
            echo "puts!";
        }

    ?>

    


</html>