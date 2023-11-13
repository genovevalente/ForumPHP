<html> 
    <head>
        <meta charset="utf-8"> 
        <title>Forum dos programadores</title> 
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
               
        include 'includes/liga_bd.php';
        
        //liga-se ao servidor com user e pass
        //$ligacao = mysqli_connect("127.0.0.1","root","","bd_forum");

        //verifica se a ligação é feita com sucesso
        //if (!$ligacao) {
        //    die ("Erro na ligação" . mysqli_connect_error());
        //} 

        //verifica se existe a sessão
        if ( session_status() !== PHP_SESSION_ACTIVE )
        {
            //instrução SQL para adicionar
            $sql = "SELECT * FROM T_USER WHERE nick='$_POST[nick]'";

            $resultado=mysqli_query($ligacao, $sql) or die (mysqli_error($ligacao));
            $linha = mysqli_fetch_assoc($resultado);
            //caso o utilizador não exista na base de dados
            if ($linha==NULL)
                header('Location: erro.html');

            //caso a senha esteja correta
            if (password_verify($_POST['pass'],$linha['pass']))
            {
                //caso o utilizador tenha sido bloqueado pelo admin
                if ($linha['apagado']==1){
                    echo "<h1>A sua conta encontra-se bloqueada pelo administrador</h1>";
                    ?>
                    <input type="button" value="Voltar ao menu" onclick="window.open('index.html', '_self')">
                    <?php
                }
                else{
                    echo "<h2>Login com sucesso!</h2>";
                    echo "<h2>Bem-vindo " .$linha['nome']."</h2>";
                    session_start();
                    $_SESSION['id']=$linha['id'];
                    $_SESSION['nick']=$linha['nick'];
                    header('Location: login2.php');
                }  
            }
            //caso a senha esteja incorreta
            else
            {
                header('Location: erro.html');
            }

            //fim do else da verificação da sessão
        }
        mysqli_close($ligacao);
        ?>
    </body>
</html>