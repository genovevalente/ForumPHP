<html> 
    <head>
        <meta charset="utf-8"> 
        <title>Forum dos programadores</title> 
        <meta http-equiv="refresh" content="5;url=index.html">
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Gestão de Utilizadores</h1>
        <?php
        //Valida se o utilizador fez login
        include 'includes/valida.php';
        //Chama a função que liga à base de dados
        include 'includes/liga_bd.php';

        //instrução SQL para inserir um novo registo
        $sql ="UPDATE t_user set apagado=0 WHERE id=$_POST[id_user]";
        
        //mensagem de sucesso caso consiga executar
        if (mysqli_query($ligacao, $sql))
            echo "<h2>Utilizador desbloqueado com sucesso!</h2>";
        mysqli_close($ligacao); echo "<br/>";
        ?>
        <br/><h4>Aguarde que vai ser redirecionado</h4><a href="index.html" target="_self">Volta ao Menu</a>
    </body>
</html>