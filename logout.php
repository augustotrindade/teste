<?php
include './scripts/config.php';
session_destroy();
header('Location: '.$site."/index.php");
?>