<html> 
    <head>
        <meta charset="utf-8"> 
        <title>Forum dos programadores</title> 
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
        <!--ao fim de 5 segundo redireciona para o index-->
        <meta http-equiv="refresh" content="5;url=index.html">
    </head>
    <body>
        <h1>Alteração de Utilizadores</h1>
        
        <?php
        //Valida se o utilizador fez login
        include 'includes/valida.php';
        //Chama a função que liga à base de dados
        include 'includes/liga_bd.php';
        $tmp=password_hash($_POST['pass'], PASSWORD_DEFAULT);
        //caso não tenha trocado a imagem
        if (empty($_FILES['ficheiro']['name'][0]))
        {
            $sql ="UPDATE t_user SET 
            nick='$_POST[nick]', 
            nome='$_POST[nome]', 
            email='$_POST[email]', 
            data_nasc='$_POST[data_nasc]',
            pass='".$tmp."' WHERE id=$_POST[id]";
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
                $sql ="UPDATE t_user SET nick='$_POST[nick]', 
                nome='$_POST[nome]', email='$_POST[email]', 
                data_nasc='$_POST[data_nasc]', 
                pass='".$tmp."', 
                foto='".$foto."' WHERE id=$_POST[id]";
            }
        }
        

        //mensagem de sucesso caso consiga executar
        if (mysqli_query($ligacao, $sql)){
            echo "<h2>Utilizador alterado com sucesso!</h2>";
        }
            
            
        mysqli_close($ligacao); 
        echo "<br/>";
        ?>
        <br/><h4>Aguarde que vai ser redirecionado</h4><a href="index.html" target="self">Volta ao Menu</a>
    </body>
</html>