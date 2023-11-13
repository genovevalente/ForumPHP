<html> 
    <head>
        <meta charset="utf-8"> 
        <meta http-equiv="refresh" content="5;url=index.html" />
        <title>Forum dos Programadores</title> 
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
            //Valida se o utilizador fez login
            include 'includes/valida.php';
            //Apaga todas as variáveis da sessão
            $_SESSION = array();
            //Finalmente, destrói a sessão
            session_destroy();
        ?>
        <h2 align="center">Sessão terminada com sucesso!</h2>

        <input type="button" value="Voltar ao inicio" onclick="window.open('index.html','_self')">

    </body>
</html>