<?php
include './scripts/config.php';

if(isset($_POST)){
// 	$m->adb->usuario->insert(array('_id'=>uniqid('user_'),'login'=>$_POST['login'],'senha'=>md5($_POST['senha']),'nome'=>"Admin"));
	$user = $m->adb->usuario->findOne(array('login'=>$_POST['login'],'senha'=>md5($_POST['senha'])));
	if($user){
		unset($user['senha']);
		$_SESSION['usuario'] = $user;
		header('Location: '.$site."/index.php");
	}
}


$tbs->LoadTemplate($doc_root.'/templates/login.html');
$tbs->Show();
?>