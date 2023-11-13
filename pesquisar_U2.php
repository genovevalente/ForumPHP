<html> 
    <head>
        <meta charset="utf-8"> 
        <title>Forum dos programadores</title> 
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Pesquisa de Utilizadores</h1>
        
        <?php //abrir a instrução para escrever código PHP
        //Valida se o utilizador fez login
        include 'includes/valida.php';
        //Chama a função que liga à base de dados
        include 'includes/liga_bd.php';

        $sql ="SELECT * FROM t_user WHERE $_POST[tema] LIKE'%".$_POST['valor']."%'";
        
        //Esta variavel vai guardar todos os dados de todos os clientes
        $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
        $numreg = 0;
        $numbloq = 0;
        //conta os registos
        //enquanto conseguir ler dados do array resultado imprime
        while($linha = mysqli_fetch_assoc($resultado)){
            if ($linha['apagado']==1)
                echo "<div style='background-color:red'>";
            echo "Id: " . $linha['id']."<br/>";
            echo "Nick: " . $linha['nick']."<br/>";
            echo "Nome: " . $linha['nome']."<br/>";
            echo "E-mail: " . $linha['email']."<br/>";
            echo "Data Nascimento: " . $linha['data_nasc']."<br/>";
            echo "Foto:<br> <img src='". $linha['foto']. "'height='100'><br/>";
            
            if ($linha['apagado']==0)
            {
                ?>
                <!--caso o utilizador não esteja bloqueado-->
                <form action="bloquear_U.php" method="post"> 
                    <input type="hidden" name="id_user" value="<?php echo $linha['id'];?>"><br>
                    <input type="submit" value="Bloquear">
                </form><br>
                <?php
            }
            else
            {
                //caso o utilizador esteja bloqueado
                $numbloq = $numbloq+1;
                ?>
                <form action="desbloquear_U.php" method="post">
                    <input type="hidden" name="id_user" value="<?php echo $linha['id'];?>"><br>
                    <input type="submit" value="Desbloquear">
                </form><br>
            </div>
                <?php
            }
                ?>
                <form action="alterar_U.php" method="post">
                    <input type="hidden" name="id_user" value="<?php echo $linha['id'];?>"><br>
                    <input type="submit" value="Alterar">
                </form><br>
                <?php
                echo "<hr>";
                $numreg = $numreg + 1;
        }

        echo "N. total de utilizadores > ". $numreg;
        echo "<br>N. total de utilizadores bloqueados > ". $numbloq;

        mysqli_close($ligacao);

        //fecho da instrução PHP
        ?> 
        <br/>
        <input type="button" value="Voltar ao menu" onclick="window.history.go(-1);">
    </body>
</html>