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
        
        ?>
        <h1>Pesquisa de utilizadores</h1>
        <form action="pesquisar_U2.php" method="post">
            Qual o campo a pesquisar:<select name="tema">
                <option value="nick">Nick</option>
                <option value="nome">Nome</option>
                <option value="email">E-mail</option>
                <option value="data_nasc">Data de nascimento</option>
            </select><br><br>
            Valor:<input type="text" size="50" name="valor" required><br/><br/>
            <input type="submit" value="Pesquisar">
            <input type="reset" value="Limpar">
            <input type="button" value="Voltar" onclick="windows.history.go(-1)">
        </form>
        <br/>
    </body>
</html>