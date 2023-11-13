<html> 
    <head>
        <meta charset="utf-8"> 
        <meta http-equiv="refresh" content="5;url=index.html" />
        <title>Forum dos programadores</title> 
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
            //Valida se o utilizador fez login
            include 'includes/valida.php';
            //Chama a função que liga à base de dados
            include 'includes/liga_bd.php';
            
            $sql="SELECT * FROM t_resp WHERE id_user=".$_SESSION['id'];
            $resultado=mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
            $numreg=0;
            while($linha=mysqli_fetch_assoc($resultado)){
                if($linha['apagado']==0){
                    echo "<font color='black'>";
                }
                else{
                    echo "<font color='red'>";
                }
                echo "Id: ".$linha['id']."<br><br>";
                echo "Texto: ".$linha['texto']."<br><br>";
                echo "Foto:<br><img src='".$linha['foto']."' height='100'><br><br>";
                if($linha['apagado']==0){
                    ?>
                    <form action="eliminarR.php" method="POST">
                        <input type="hidden" value="<?php echo $linha['id']?>" name="id_post">
                        <input type="submit" value="Eliminar Resposta">
                    </form>
                    <?php
                }
                if($linha['apagado']==1){
                    ?>
                    <form action="recuperarR.php" method="POST">
                        <input type="hidden" value="<?php echo $linha['id']?>" name="id_post">
                        <input type="submit" value="Recuperar Resposta">
                    </form>
                    <?php
                }
                if($linha['apagado']>1){
                    echo "<marquee><h1>Resposta Bloqueada pela ADMIN</h1></marquee>";
                }
                echo "<hr>";
                $numreg=$numreg+1;
            }
            echo "número de Respostas > ".$numreg;
            mysqli_close($ligacao);
            ?>
            <br><br>
            <input type="button" value="Voltar ao menu" onclick="window.history.go(-1);">
        
    </body>
</html>