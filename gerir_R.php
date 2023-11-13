<html> 
    <head>
        <meta charset="utf-8"> 
        <title>Forum dos programadores</title> 
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Gestão de Posts</h1>
        
        <?php //abrir a instrução para escrever código PHP
        //Valida se o utilizador fez login
        include 'includes/valida.php';
        //Chama a função que liga à base de dados
        include 'includes/liga_bd.php';

        //criação de instrução SQL para selecionar todos os registos
        $sql ="SELECT * FROM t_resp";
        
        //Esta variavel vai guardar todos os dados de todos os clientes
        $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));

        //enquanto conseguir ler dados do array resultado imprime
        while($linha = mysqli_fetch_assoc($resultado)){
            if ($linha['apagado']>=1)
                echo "<div style='background-color:red'>";
            echo "Id: " . $linha['id']."<br/>";
            echo "Texto: " . $linha['texto']."<br/>";
            echo "Foto:<br> <img src='". $linha['foto']. "'height='100'><br/>";
            
            if ($linha['apagado']==0)
            {
                ?>
                <!--caso não tenha sido eliminado-->
                <form action="eliminarRadmn.php" method="post"> 
                    <select name="motivo">
                        <option value="2">Violência</option>
                        <option value="3">Pornografia</option>
                        <option value="4">Racismo</option>
                        <option value="5">Publicidade</option>
                        <option value="6">Outros</option>
                    </select>
                    <input type="hidden" value="<?php echo $linha['id']?>" name="id_post">
                    <input type="submit" value="Eliminar Resposta">
                </form><br>
                <?php
            }
            else
            {

                ?>
                <form action="recuperarR.php" method="post">
                    <input type="hidden" value="<?php echo $linha['id']?>" name="id_post">
                    <input type="submit" value="Recuperar Resposta">
                </form>
                <?php
                echo "</div>";

            }
        }

        mysqli_close($ligacao);

        //fecho da instrução PHP
        ?> 
        <br/>
        <input type="button" value="Voltar ao menu" onclick="window.history.go(-1);">
    </body>
</html>