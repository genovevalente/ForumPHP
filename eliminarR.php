<html> 
    <head>
        <meta charset="utf-8"> 
        <meta http-equiv="refresh" content="5;url=index.html" />
        <title>Forum dos programadores</title> 
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
            
        //Valida se o utilizador fez login
        include 'includes/valida.php';
        //Chama a função que liga à base de dados
        include 'includes/liga_bd.php';

            $sql ="UPDATE t_resp set apagado=1 WHERE id =". $_POST['id_post'];

        if (mysqli_query($ligacao, $sql)){
            echo "<h1>Resposta removida com sucesso!</h1>";
        }
        mysqli_close($ligacao);
        ?>
            <input type="button" value="Continuar" onclick="window.history.go(-2)">
        
    </body>
</html>