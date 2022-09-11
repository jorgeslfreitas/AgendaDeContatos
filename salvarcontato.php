<?php
    //Capturar os valores enviados pelo método GET
    $idContato = $_GET["campoIDCONTATO"];
    $nome = $_GET["campoNOME"];
    $email = $_GET["campoEMAIL"];
    $telefone = $_GET["campoTELEFONE"];
    $idCidade = $_GET["campoIDCIDADE"];
    $idTipoContato = $_GET["campoIDTIPOCONTATO"];
    
    //Incluir o arquivo classeContato.php
    include ("classeContato.php");
    
    //Instanciar o objeto $contato
    $contato = new classeContato();
    
    //Definir os valores dos atributos do objeto
    
    $contato->setIdContato($idContato);
    $contato->setNome($nome);
    $contato->setEmail($email);
    $contato->setTelefone($telefone);
    $contato->setIdCidade($idCidade);
    $contato->setIdTipoContato($idTipoContato);
    
    //Verificar se deve ser executado inserirContato() ou alterarContato()
    if ($contato->getIdContato() == 0) {
        //Executar o método inserirContato()
        $contato->inserirContato();
        //Mensagem
        echo "<script>alert('Contato $nome cadastrado');</script>";
        //Redirecionamento via javascript para contatos.php
        echo "<script>window.location.assign('contatos.php');</script>";
    } else {
        //Executar o método alterarContato()
        $contato->alterarContato();
        //Mensagem
        echo "<script>alert('Contato $nome alterado');</script>";
        //Redirecionamento via javascript para contatos.php
        echo "<script>window.location.assign('contatos.php');</script>";
    }