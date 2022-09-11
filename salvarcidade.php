<?php
    //Capturar os valores enviados pelo método GET
    $idCidade = $_GET["campoIDCIDADE"];
    $nome = $_GET["campoNOME"];
    
    //Incluir o arquivo classeCidade.php
    include ("classeCidade.php");
    
    //Instanciar o objeto $cidade
    $cidade = new classeCidade();
    
    //Definir os valores atribuidos do objeto
    $cidade->setIdCidade($idCidade);
    $cidade->setNome($nome);
    
    //Verificar se deve ser executado inserirCidade() ou alterarCidade()
    if ($cidade->getIdCidade() == 0) {
        //Executa o método inserirCidade
        $cidade->inserirCidade();
        //Mensagem
        echo "<script>alert('Cidade $nome cadastrada');</script>";
        //Redirecionamento  via javascript para cidades.php
        echo "<script>window.location.assign('cidades.php'); </script>";
    } else {
        //Executar o método alterarCidade()
        $cidade->alterarCidade();
        //Mensagem
        echo "<script>alert('Cidade $nome alterada'); </script>";
        //Redirecionamento via javascript para cidades.php
        echo "<script>window.location.assign('cidades.php'); </script>";
    }
  


