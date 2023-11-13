<html> 
    <head>
        <meta charset="utf-8"> 
        <meta http-equiv="refresh" content="2;url=login2.php" />
        <title>Forum dos programadores</title> 
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <?php 
        //Valida se o utilizador fez login
        include 'includes/valida.php';
        //Chama a função que liga à base de dados
        include 'includes/liga_bd.php';

        $sql ="INSERT INTO t_post (tema, titulo, texto, foto, id_user) VALUES
        ('$_POST[tema]','$_POST[titulo]','$_POST[texto]','$_POST[foto]',$_POST[id])";

    if (mysqli_query($ligacao, $sql)){
        echo "<h1>Post colocado com sucesso!</h1>";
    }
    mysqli_close($ligacao);
    ?>

        <input type="button" value="Continuar" onclick="window.history.go(-2)">

    </body>
</html>