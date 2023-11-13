<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8"> 
        <title>Forum dos programadores</title> 
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php 
        //Valida se o utilizador fez login
        include 'includes/valida.php';
        ?>

        <h1>Inserir Posts</h1>
        <form action="inserirP2.php" method="POST" name="f1">
        Id user: <input type="text" size="20" maxlength="20" name="id" readonly value="<?php echo $_SESSION['id']?>"><br><br>
        Tema: <input type="text" size="20" maxlength="20" name="tema" required><br><br>
        Título: <input type="text" size="50" maxlength="50" name="titulo" required><br><br>
        Texto: <br><textarea name="texto" cols="80" rows="4" required></textarea><br><br>
        Foto(url):<br><textarea name="foto" cols="80" rows="4"></textarea><br><br>

        <input type="submit" value="Colocar Post"><br><br>
        <input type="reset" value="Limpar"><br><br>
        <input type="button" value="Voltar" onclick="window.history.go(-1)">

        </form>
    </body>
</html>