<?php

class classeTipoContato {
    //Atributos
    private $idTipoContato;
    private $nome;
    
    function getIdTipoContato() {
        return $this->idTipoContato;
    }

    function getNome() {
        return $this->nome;
    }

    function setIdTipoContato($idTipoContato): void {
        $this->idTipoContato = $idTipoContato;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }
    
    //Método CRUD
    
    //Método inserirTipoContato
    function inserirTipoContato () {
        include ("conexao.php");
        $comando = "INSERT INTO tipocontato (NOME) VALUES (?);";
        $resposta = $PDO->prepare($comando);
        $resposta->bindValue(1, $this->nome);
        $resposta->execute();
        
    }
    
    //Método consultarTipoContato
    function consultarTipoContato () {
        include ("conexao.php");
        $comando = "SELECT * FROM tipocontato WHERE IDTIPOCONTATO=?;";
        $resposta = $PDO->prepare($comando);
        $resposta->bindValue(1, $this->idTipoContato);
        $resposta->execute();
        
        foreach ($resposta as $registro) {
            $this->nome = utf8_encode($registro["NOME"]);
        }
    }
    
    //Método alterarTipoContato
    function alterarTipoContato (){
        include ("conexao.php");
        $comando = "UPDATE tipocontato SET "
                . "NOME=? "
                . "WHERE (IDTIPOCONTATO=?);";
        $resposta = $PDO->prepare($comando);
        $resposta->bindValue(1, $this->nome);
        $resposta->bindValue(2, $this->idTipoContato);
        $resposta->execute();        
    }
    
    //Método excluirTipoContato
    function excluirTipoContato () {
        include ("conexao.php");
        
        $comando = "DELETE FROM tipocontato WHERE (IDTIPOCONTATO=?);";
        $resposta = $PDO->prepare($comando);
        $resposta->bindValue(1, $this->idTipoContato);
        $resposta->execute();
        
    }

}
