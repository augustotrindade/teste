<?php
session_start();
$site = "/teste";
$doc_root = $_SERVER["DOCUMENT_ROOT"].$site;
include_once($doc_root.'/tbs_us/tbs_class.php');
$tbs = new clsTinyButStrong;

try {
	$m = new MongoClient("mongodb://localhost:27017");
} catch (MongoConnectionException $e) {
	$tbs->LoadTemplate($doc_root.'/templates/error.html');
	$tbs->Show();
	die("Erro na conexão com o DB");
}
?>