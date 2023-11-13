<html> 
    <head>
        <meta charset="utf-8"> 
        <meta http-equiv="refresh" content="5;url=index.html" />
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
        <title>Forum dos programadores</title> 
    </head>
    <body>
        <h1>Registo de Utilizadores</h1>

        <?php
        //Valida se o utilizador fez login
        //include 'includes/valida.php';
        //Chama a função que liga à base de dados
        include 'includes/liga_bd.php';

        include 'includes/valida_foto.php';

        //verifica se o upload está a 0 por algum erro
        if ($uploadOk == 0) {
            echo "O seu ficheiro não foi enviado.";
            //se tudo está correto faz o upload do ficheiro
        } else {
            if ($uploadOk == 1) {

                $tmp=password_hash($_POST['pass'], PASSWORD_DEFAULT);
                //instrução SQL para inserir um novo registo
                $sql ="INSERT INTO t_user (nick, nome, email, data_nasc, pass, foto) VALUES ('$_POST[nick]','$_POST[nome]','$_POST[email]','$_POST[data_nasc]','".$tmp."', '".$foto."')";               
                //tento inserir na base de dados
                echo $sql;
                if (mysqli_query($ligacao, $sql)){
                    echo "<h2>Registo efetuado com sucesso!</h2>";
                    move_uploaded_file($_FILES["ficheiro"]["tmp_name"], $target_file);
                }
            }
        }

        mysqli_close($ligacao); echo "<br/>";
        ?>

        <br/><h2>Aguarde que vai ser redirecionado</h2><a href="index.html" target="_self">Volta ao Menu</a>
    </body>
</html>