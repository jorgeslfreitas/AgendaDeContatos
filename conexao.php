<?php
//Declarar e definir as variáveis utilizadas para a conexão com o mysql e acesso
//ao banco de dados AgendaDeContatos

    $servidorMySql = "localhost"; //Servidor
    $usuarioMySql = "root"; //Usuário
    $senhaMySql = ""; //Senha
    $bancoMySql = "contatos"; //Nome do banco de dados

    try {
        $PDO = new PDO("mysql:host=$servidorMySql;dbname=$bancoMySql", $usuarioMySql, $senhaMySql);
    } catch (PDOException $erroDeExcessaoPDO) {
        //Mensagem de erro
        echo "<script>alert ('Erro ao conectar com o Banco de Dados'); </script>";

        //Redirecionamento via JavaScript, para o index.php
        echo "<script> window.location.assign('index.php'); </script>";
    }
        
