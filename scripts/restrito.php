<?php
if(!isset($_SESSION['usuario'])){
	header('Location: '.$site."/login.php");
}