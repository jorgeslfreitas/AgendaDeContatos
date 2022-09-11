<?php
$idContato = $_GET["idContato"];
include ("classeContato.php");
$contato = new classeContato();
$contato->setIdContato($idContato);
$contato->setNome("");
$contato->setEmail("");
$contato->setTelefone("");
$contato->setIdCidade(0);
$contato->setIdTipoContato(0);

if ($contato->getIdContato() != 0){
    $contato->consultarContato();
}
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Agenda de Contatos</title>
  </head>
  <body>
      
      <!--Início da DIV Container-->
      <div class="container">
          <!--Início NAV BAR-->
          <ul class="nav nav-pills">
              <li class="nav-item">
                  <a class="nav-link" href="index.php">Principal</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link active" href="contatos.php">Contatos</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="cidades.php">Cidades</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="tiposdecontatos.php">Tipos de Contatos</a>
              </li>
          </ul>
          <!--Fim NAV BAR-->
          
          <!--Início do cabeçalho-->
          <header>
              <div class="alert alert-secondary" role="alert">
                  <center>
                      <h1>Contato</h1>
                  </center>
              </div>
          </header>        
          <!--Fim do cabeçalho-->  
          
          <br> <br>
          
          <!--Ínicio do formulário-->
          <form name="formContato" action="salvarcontato.php" method="GET">
                           
              <!--Ínicio do elemento de entrada input para IDCONTATO-->
              <div class="form-group">
                  <label for="campoIDCONTATO">Código do contato</label>
                  <input class="form-control"
                         type="text"
                         id="campoIDCONTATO"
                         value="<?php echo $contato->getIdContato(); ?>"
                         name="campoIDCONTATO"
                         placeholder="Input só de leitura, aqui..."
                         readonly>
                  <small id="campoIDCONTATOHelp" class="form-text text-muted">O código é gerado pelo sistema.</small>
              </div>              
              <!--Fim do elemento de entrada input para IDCONTATO-->
              
              <!--Ínicio do elemento de entrada input para NOME-->
              <div class="form-group">
                  <label for="campoNOME">Nome</label>
                  <input class="form-control"
                         type="text"
                         id="campoNOME"
                         name="campoNOME"
                         value="<?php echo $contato->getNome(); ?>"
                         aria-describedby="nomeHelp"
                         placeholder="Nome do contato"
                         required>
                  <small id="nomeHelp" class="form-text text-muted">Informe o nome completo do contato.</small>
              </div>              
              <!--Fim do elemento de entrada input para NOME-->
              
              <!--Ínicio do elemento de entrada input para EMAIL-->
              <div class="form-group">
                  <label for="campoEMAIL">Endereço de email</label>
                  <input class="form-control"
                         type="email"
                         id="campoEMAIL"
                         name="campoEMAIL"
                         value="<?php echo $contato->getEmail(); ?>"
                         aria-describedby="emailHelp"
                         placeholder="Informe o email"
                         required>
                  <small id="emailHelp" class="form-text text-muted">Informe um email válido do contato.</small>
              </div>
              
              <!--Fim do elemento de entrada input para EMAIL-->
              
              <!--Ínicio do elemento de entrada input para TELEFONE-->
              <div class="form-group">
                  <label for="campoTELEFONE">Telefone</label>
                  <input class="form-control"
                         type="tel"
                         id="campoTELEFONE"
                         name="campoTELEFONE"
                         value="<?php echo $contato->getTelefone(); ?>"
                         aria-describedby="telefoneHelp"
                         placeholder="Informe o telefone no local indicado"
                         pattern="[0-9]{2}-[0-9]{5}-[0-9]{4}"
                         required>
                  <small id="telefoneHelp" class="form-text text-muted">Informe um telefone no formato 99-99999-9999.</small>
              </div>              
              <!--Fim do elemento de entrada input para TELEFONE-->
              
              <!--Ínicio do elemento de entrada input para IDCIDADE-->
              <div class="form-group">
                  <label for="campoIDCIDADE">Selecione a cidade</label>
                  <select class="form-control"
                          id="campoIDCIDADE"
                          name="campoIDCIDADE"
                          aria-describedby="cidadeHelp"
                          required>
                  <?php
                    include ("conexao.php");
                    $select = "SELECT * FROM cidade ORDER BY NOME";
                    $retornoDaConsulta = $PDO->prepare($select);
                    $retornoDaConsulta->execute();
                    foreach ($retornoDaConsulta as $registro) {
                        $idCidade = utf8_encode($registro["IDCIDADE"]);
                        $nome = utf8_encode($registro["NOME"]);
                        if ($contato->getIdCidade() != $idCidade) {
                            echo "<option value='$idCidade'>$nome</option>";
                        } else {
                            echo "<option value='$idCidade' selected>$nome</option>";
                        }
                    }
                   
                  ?>
                  </select>
                  <small id="cidadeHelp" class="form-text text-muted">Informe a cidade onde o contato mora.</small>
              </div>              
              <!--Fim do elemento de entrada input para IDCIDADE-->
              
              <!--Ínicio do elemento de entrada input para IDTIPODECONTATO-->
              <div class="form-group">
                  <label for="campoIDTIPOCONTATO">Tipo de contato</label>
                  <select class="form-control"
                          id="campoIDTIPOCONTATO"
                          name="campoIDTIPOCONTATO"
                          aria-describedby="tipocontatoHelp"
                          required>
                    <?php
                        include ("conexao.php");
                        $select = "SELECT * FROM numtipocontato";
                        //$select = "SELECT * FROM tipocontato ORDER BY NOME";
                        $retornoDaConsulta = $PDO->prepare($select);
                        $retornoDaConsulta->execute();
                        foreach ($retornoDaConsulta as $registro) {
                            $idTipoContato = utf8_encode($registro["IDTIPOCONTATO"]);
                            $nome = utf8_encode($registro["NOME"]);
                            if ($contato->getIdTipoContato() != $idTipoContato) {
                                echo "<option value='$idTipoContato'>$nome</option>";
                            } else {
                                echo "<option value='$idTipoContato' selected>$nome</option>";
                        }
                    }
                   
                  ?>
                  </select>
                  <small id="tipocontatoHelp" class="form-text text-muted">Indique o tipo de contato.</small>
              </div>               
              <!--Fim do elemento de entrada input para IDTIPODECONTATO-->
              
              <!--Ínicio do botão ENVIAR-->
              <input type="submit" value="Salvar">
              <!--Fim do botão ENVIAR-->
          </form>
          
          <br> <br>
          
          <!--Fim do formulário-->
          
          <!--Início do footer-->
          <footer>
              <div class="alert alert-info" role="alert">
                  <center>
                      <strong>Agenda de contatos</strong> .:. Desenvolvido por Jorge Freitas .:. Direitos Reservados &copy
                  </center>
              </div>
          </footer>
          <!--Fim do footer-->
          
          
      </div>
      <!--Fim da DIV Container-->

      <!-- Optional JavaScript; choose one of the two! -->

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <!-- Option 2: Separate Popper and Bootstrap JS -->
      <!--
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
      -->
  </body>
</html>