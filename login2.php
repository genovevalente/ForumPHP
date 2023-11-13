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
        
        echo "<h2>Login com sucesso!</h2>";
        echo "<h2>Bem-vindo " .$_SESSION['nick']."</h2>";
        ?>

            <input type="button" value="Editar Perfil" onclick="window.open('perfil.php','_self')">
            <input type="button" value="Colocar Post" onclick="window.open('inserirP.php','_self')">
            <input type="button" value="Listar Posts" onclick="window.open('listar_P.php?tema=Todos','_self')">
            <input type="button" value="Meus Posts" onclick="window.open('meusP.php','_self')">
            <input type="button" value="Minhas Respostas" onclick="window.open('minhasR.php','_self')">
            <input type="button" value="Logout" onclick="window.open('logout.php','_self')">
            
            <?php
          
            if (strcmp($_SESSION['nick'],"admin")==0)
            {
                ?>
                <br><br><h2>Área de Administração</h2>
                <input type="button" value="Gerir Utilizadores" onclick="window.open('gerir_U.php','_self')">
                <input type="button" value="Pesquisar Utilizadores" onclick="window.open('pesquisar_U.php','_self')">
                <input type="button" value="Gerir Posts" onclick="window.open('gerir_P.php','_self')">
                <input type="button" value="Pesquisar Posts" onclick="window.open('pesquisar_P.php','_self')">
                <input type="button" value="Gerir Respostas" onclick="window.open('gerir_R.php','_self')">
            
            <?php } ?>
    </body>
</html>