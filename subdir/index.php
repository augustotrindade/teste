<?php
include '../scripts/config.php';



$tbs->LoadTemplate($doc_root.'/templates/index.html');

$tbs->MergeField('usuario',$_SESSION['usuario']);
$tbs->Show();
?>
