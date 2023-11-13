 <html>
    <head>
        <meta charset="utf-8">
        <title>Forum dos programadores</title>
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Alteração de Utilizadores</h1>
        <?php //abrir a instrução para escrever código PHP
        
        //Valida se o utilizador fez login
        include 'includes/valida.php';
        //Chama a função que liga à base de dados
        include 'includes/liga_bd.php';
        
        //criação de instrução SQL para selecionar o id e nome da tabela clientes
        $sql ="SELECT * FROM t_user WHERE id=$_POST[id_user]";
        
        //Esta variavel vai guardar todos os dados de todos os clientes
        $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
        $linha = mysqli_fetch_assoc($resultado);
       ?>

        <!-- o metodo post envia os dados de uma página para a outra de forma escondida
            o metodo get envia os dados para a página seguinte pela barra de endereço-->


            <form action="alterar_U2.php" method="post" enctype="multipart/form-data"> <!--abrir e fechar o form-->
            <p>ID:<input type="text" name="id" size="10" readonly value="<?php echo $linha['id'];?>"></p>
            <p>Nick:<input type="text" size="20" name="nick" required value="<?php echo $linha['nick'];?>"></p>
            <p>Nome:<input type="text" size="100" name="nome" required value="<?php echo $linha['nome'];?>"></p>
            <p>E-mail: <input type="text" size="50" name="email" required value="<?php echo $linha['email'];?>"></p>
            <p>Data de Nascimento: <input type="date" size="10" name="data_nasc" required value="<?php echo $linha['data_nasc'];?>"></p>
            <p>Pass: <input type="password" size="20" name="pass"></p>
            <p>Foto:<br><img src="pics/<?php echo $linha['foto'];?>" width="150">
                <input type="hidden" name="nome_foto" value="<?php echo $linha['foto'];?>">
            <br><br>Nova foto:<input type="file" name="ficheiro"><br><br>

            <input type="submit" value="Alterar">
            <br><br>
            <a href="index.html" target="_self">Voltar ao menu</a>
        </form>

    <?php
    mysqli_close($ligacao);
    ?>

    </body>
</html>