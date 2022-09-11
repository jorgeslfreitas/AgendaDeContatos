<?php

$idTipoContato = $_GET["idTipoContato"];
include ("classeTipoContato.php");
$tipodecontato = new classeTipoContato();
$tipodecontato->setIdTipoContato($idTipoContato);
$resultado = $tipodecontato->excluirTipoContato();
echo "<script>alert('Tipo de contato deletado');</script>";
echo "<script>window.location.assign('tiposdecontatos.php');</script>";
