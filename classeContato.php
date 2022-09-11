<?php

class classeContato {
    
    //Atributos
    private $idContato;
    private $nome;
    private $email;
    private $telefone;
    private $idCidade;
    private $idTipoContato;
    
    
    //Getters e Setters
    
    public function getIdContato() {
        return $this->idContato;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getIdCidade() {
        return $this->idCidade;
    }

    public function getIdTipoContato() {
        return $this->idTipoContato;
    }

    public function setIdContato($idContato): void {
        $this->idContato = $idContato;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setTelefone($telefone): void {
        $this->telefone = $telefone;
    }

    public function setIdCidade($idCidade): void {
        $this->idCidade = $idCidade;
    }

    public function setIdTipoContato($idTipoContato): void {
        $this->idTipoContato = $idTipoContato;
    }
    
    //Métodos CRUD
    
    //Método inserirContato - C-Create
    function inserirContato(){
        include ("conexao.php"); //Conectar com o BD
        $comando = "INSERT INTO contato (NOME, EMAIL, TELEFONE, IDCIDADE, IDTIPOCONTATO) VALUES (?, ?, ?, ?, ?);";
        $resposta = $PDO-> prepare ($comando);
        
        //Definir os 5 parâmetros, utilizando os atributos da classe
        $resposta->bindValue (1, $this->nome);
        $resposta->bindValue (2, $this->email);
        $resposta->bindValue (3, $this->telefone);
        $resposta->bindValue (4, $this->idCidade);
        $resposta->bindValue (5, $this->idTipoContato);
        $resposta->execute();
    }
    
    //Método consultarContato
    function consultarContato(){
        include ("conexao.php");
        // Montar o comando a ser executado
        $comando = "SELECT * FROM contato WHERE IDCONTATO=?;";
        $resposta = $PDO->prepare($comando);
        $resposta->bindValue (1, $this->idContato);
        $resposta->execute();
        
        //Atribuir aos atributos o resultado da consulta
        foreach ($resposta as $registro) {
            $this->idContato = utf8_encode($registro["IDCONTATO"]);
            $this->nome = utf8_encode($registro["NOME"]);
            $this->email = utf8_encode($registro["EMAIL"]);
            $this->telefone = utf8_encode($registro["TELEFONE"]);
            $this->idCidade = utf8_encode($registro["IDCIDADE"]);
            $this->idTipoContato = utf8_encode($registro["IDTIPOCONTATO"]);
        }
    }
        
        //Alterar contato
        function alterarContato() {
            include ("conexao.php");
            $comando = "UPDATE contato SET "
                    . "NOME=?,"
                    . "EMAIL=?,"
                    . "TELEFONE=?,"
                    . "IDCIDADE=?,"
                    . "IDTIPOCONTATO=?"
                    . "WHERE (IDCONTATO=?);";
            $resposta = $PDO->prepare($comando);
            
            //Definir os 6 parâmetros, utilizando os atributos da classe
            $resposta->bindValue (1, $this->nome);
            $resposta->bindValue (2, $this->email);
            $resposta->bindValue (3, $this->telefone);
            $resposta->bindValue (4, $this->idCidade);
            $resposta->bindValue (5, $this->idTipoContato);
            $resposta->bindValue (6, $this->idContato);
            $resposta->execute();               
        }
        
        function excluirContato () {
            include("conexao.php");
            
            $comando = "DELETE FROM contato WHERE (IDCONTATO=?);";
            $resposta = $PDO->prepare($comando);
            $resposta->bindValue(1, $this->idContato);
            $resposta->execute();
        }
        
        
    }
