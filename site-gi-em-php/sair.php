<?php
session_start();

if(!empty($_SESSION['id'])){
unset($_SESSION['id'], $_SESSION['nome'],$_SESSION['email']);

$_SESSION['msg']="Deslogado com sucesso";
header("Location: login.php");
}else{
    header("Location: login.php");  
}

?>