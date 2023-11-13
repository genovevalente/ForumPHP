<html> 
    <head>
        <meta charset="utf-8"> 
        <meta http-equiv="refresh" content="5;url=login2.php">
        <title>Forum dos programadores</title> 
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        
        <?php
        //Valida se o utilizador fez login
        include 'includes/valida.php';
        //Chama a função que liga à base de dados
        include 'includes/liga_bd.php';

        //primeiro envio a nova imagem
        //move_uploaded_file($_FILES["ficheiro"]["tmp_name"], $target_file);
        //apago a imagem anterior
        //unlink('pics/'.$_POST['nome_foto']);
        //$tmp=password_hash($_POST['pass'], PASSWORD_DEFAULT);

        $tmp=password_hash($_POST['pass'], PASSWORD_DEFAULT);
        //caso não tenha trocado a imagem
        if (empty($_FILES['ficheiro']['name'][0]))
        {
            $sql ="UPDATE t_user SET  
            nome='$_POST[nome]', 
            email='$_POST[email]', 
            data_nasc='$_POST[data_nasc]',
            pass='".$tmp."' WHERE id=$_SESSION[id]";
        }
        //caso tenha trocado a imagem
        else
        {
            include 'includes/valida_foto.php';
            if ($uploadOk ==1){
                //primeiro envio a nova imagem
                move_uploaded_file($_FILES["ficheiro"]["tmp_name"], $target_file);
                //apago a imagem anterior
                unlink('pics/'.$_POST['nome_foto']);
                $tmp=password_hash($_POST['pass'], PASSWORD_DEFAULT);

                //crio a instrução sql para atualizar a base de dados
                $sql ="UPDATE t_user SET 
                nome='$_POST[nome]', email='$_POST[email]', 
                data_nasc='$_POST[data_nasc]', 
                pass='".$tmp."', 
                foto='".$foto."' WHERE id=$_SESSION[id]";
            }
        }

        //mensagem de sucesso caso consiga executar
        if (mysqli_query($ligacao, $sql)){
            echo "<h1>Dados alterados com sucesso!</h1>";
        }
            
        mysqli_close($ligacao);
        echo "<br/>";
        ?>
        <h2>Aguarde que vai ser redirecionado</h2>
    </body>
</html>