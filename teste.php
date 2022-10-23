<DOCTYPE html>
<html>
    <head>

    </head>    
    <body>
        <form action="api/sendEmail.php" method="post">
            <label for="fname">Email:</label>
            <input type="text" id="fname" name="mail"><br><br>
            <label for="lname">Local:</label>
            <input type="text" id="lname" name="locale"><br><br>
            <label for="lname">conteudo:</label>
            <input type="text" id="lname" name="content"><br><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>