<?php
include '../scripts/config.php';
include '../scripts/restrito.php';

$tbs->LoadTemplate('./templates/index.html');

$tbs->MergeBlock('carros', $m->adb->carro->find(array('_id'=>array('$in'=>(isset($_SESSION['usuario']['carros']) ? $_SESSION['usuario']['carros'] : array()))))) ;
$tbs->Show();
?>