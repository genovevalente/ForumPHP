<html>
    <head>
        <meta charset="utf-8">
        <title>Forum dos programadores</title>
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php //abrir a instrução para escrever código PHP
        //Valida se o utilizador fez login
        include 'includes/valida.php';
        //Chama a função que liga à base de dados
        include 'includes/liga_bd.php';
        
        //criação de instrução SQL para selecionar o id e nome da tabela clientes
        $sql ="SELECT * FROM t_user WHERE id=".$_SESSION['id'];
        
        //Esta variavel vai guardar todos os dados de todos os clientes
        $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
        $linha = mysqli_fetch_assoc($resultado);
       ?>

            <h1>Editar dados do utilizador</h1>
            <form action="perfil2.php" method="post" enctype="multipart/form-data">        
            Nick:<input type="text" size="20" name="nick" readonly value="<?php echo $linha['nick'];?>"><br><br>
            Nome:<input type="text" size="100" name="nome" value="<?php echo $linha['nome'];?>"><br><br>
            E-mail: <input type="text" size="50" name="email" value="<?php echo $linha['email'];?>"><br><br>
            Data de Nascimento: <input type="date" required size="10" name="data_nasc" value="<?php echo $linha['data_nasc'];?>"><br><br>
            Pass: <input type="password" size="20" name="pass" value="" required><br/><br/>
            Foto (atual): <br><img src="pics/<?php echo $linha['foto'] ?>" width="100">
                <input type="hidden" name="nome_foto" value="<?php echo $linha['foto'];?>">
            Foto:<input type="file" name="ficheiro"><br><br>

            <input type="submit" value="Alterar"><br><br>
            <input type="reset" value="Limpar"><br><br>
            <input type="button" value="Voltar" onclick="window.history.go(-1)">

        </form>

    </body>
</html>