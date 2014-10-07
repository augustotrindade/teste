<?php
include './scripts/config.php';
include './scripts/restrito.php';

$tbs->LoadTemplate($doc_root.'/templates/index.html');
$tbs->Show();
?>
