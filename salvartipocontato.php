<?php
    //Capturar os valores enviados pelo método GET
    $idTipoContato = $_GET["campoIDTIPOCONTATO"];
    $nome = $_GET["campoNOME"];
    
    //Incluir o arquivo classeTipoContato.php
    include ("classeTipoContato.php");
    
    //Instanciar o objeto $tipoContato
    $tipodecontato = new classeTipoContato();
    
    //Definir os valores atribuidos do objeto
    $tipodecontato->setIdTipoContato($idTipoContato);
    $tipodecontato->setNome($nome);
    
    //Verificar se deve ser executado inserirTipoContato() ou alterarTipoContato()
    if ($tipodecontato->getIdTipoContato() == 0) {
        //Executa o método inserirTipoContato()
        $tipodecontato->inserirTipoContato();
        //Mensagem
        echo "<script>alert('Tipo de contato $nome cadastrado');</script>";
        //Redirecionamento  via javascript para tiposdecontatos.php
        echo "<script>window.location.assign('tiposdecontatos.php'); </script>";
    } else {
        //Executar o método alterarTipoContato()
        $tipodecontato->alterarTipoContato();
        //Mensagem
        echo "<script>alert('Tipo de contato $nome alterado'); </script>";
        //Redirecionamento via javascript para tiposdecontatos.php
        echo "<script>window.location.assign('tiposdecontatos.php'); </script>";
    }
  
