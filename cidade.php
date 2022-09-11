<?php
    $idCidade = $_GET["idCidade"];
    
    include ("classeCidade.php");
    
    $cidade = new classeCidade();
    $cidade ->setIdCidade($idCidade);
    $cidade->setNome("");
    
    if ($cidade->getIdCidade() != 0) {
        $cidade->consultarCidade();
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
                  <a class="nav-link" href="contatos.php">Contatos</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link active" href="cidades.php">Cidades</a>
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
                      <h1>Cidade</h1>
                  </center>
              </div>
          </header>        
          <!--Fim do cabeçalho-->
          
          <br> <br>
          
          <!--Ínicio do formulário-->
          <form name="formCidade" action="salvarcidade.php" method="GET">
              
              <!--Ínicio do elemento de entrada input para IDCIDADE-->
              <div class="form-group">
                  <label for="campoIDCIDADE">Código da cidade</label>
                  <input class="form-control"
                          id="campoIDCIDADE"
                          name="campoIDCIDADE"
                          placeholder="Input só de leitura aqui..."
                          value="<?php echo $cidade->getIdCidade();?>"
                          readonly>
                  <small id="campoIDCIDADEHelp" class="form-text text-muted">O código é gerado pelo sistema.</small>
              </div>               
              <!--Fim do elemento de entrada input para IDCIDADE-->
              
              <!--Ínicio do elemento de entrada input para NOME-->
              <div class="form-group">
                  <label for="campoNOME">Nome</label>
                  <input class="form-control"
                         type="text"
                         id="campoNOME"
                         name="campoNOME"
                         aria-describedby="nomeHelp"
                         placeholder="Nome da cidade"
                         value="<?php echo $cidade->getNome();?>"
                         required>
                  <small id="nomeHelp" class="form-text text-muted">Informe o nome da cidade.</small>
              </div>              
              <!--Fim do elemento de entrada input para NOME-->
              
              <!--Ínicio do botão ENVIAR-->
              <input type="submit" value="Salvar">
              <!--Fim do botão ENVIAR-->
              
          </form>
          <!--Fim do formulário-->
          
          <br>
          
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