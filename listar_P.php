<html> 
    <head>
        <meta charset="utf-8"> 
        <title>Forum dos programadores</title>
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
    </head>
    <body> 
        <h1>Listagem de Posts</h1>       
        <?php //abrir a instrução para escrever código PHP

        //Valida se o utilizador fez login
        include 'includes/valida.php';
        //Chama a função que liga à base de dados
        include 'includes/liga_bd.php';
        //Inclui a filtragem por tema/categoria
        include 'includes/filtra_P.php';
        
        //Esta variavel vai guardar todos os dados de todos os clientes
        $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
        $numreg = 0;
        //conta os registos
        //enquanto conseguir ler dados do array resultado imprime
        while($linha = mysqli_fetch_assoc($resultado)){
            echo "<h3>Id: " . $linha['id']."</h3>";
            echo "<b>Tema</b>: " . $linha['tema']."<br>";
            echo "<b>Titulo</b>: " . $linha['titulo']."<br>";
            echo "<b>Texto</b>: " . $linha['texto']."<br>";
            echo "<b>Foto:</b><br> <img src='". $linha['foto']. "'height='100'><br><br/>";

            $sql2 ="SELECT * FROM t_user WHERE id=" . $linha['id_user'];

            $resultado2=mysqli_query($ligacao, $sql2) or die(mysqli_error($ligacao));
            $linha2=mysqli_fetch_assoc($resultado2);
            echo "<h3>Nick: " . $linha2['nick']."</h3>";
            ?>
            <form action="inserirR.php" method="post">
                <input type="hidden" value="<?php echo $linha['id']?>" name="id_post">
                <input type="submit" value="Ver Respostas / Responder">                
            </form>
            <?php
            echo "<hr>";
            $numreg = $numreg + 1;
        }

        echo "N. de Postagens > " . $numreg;
        mysqli_close($ligacao);
        ?>

        <br><br>
        <input type="button" value="Voltar ao menu" onclick="window.history.go(-1);">
    </body>
</html>