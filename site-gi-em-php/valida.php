<?php
session_start();
include_once './conexao.php';

$btnLogin = filter_input(INPUT_POST, 'fazer-login' , FILTER_SANITIZE_STRING);
if($btnLogin){
    $email = filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'password' , FILTER_SANITIZE_STRING);
    //echo "$email - $senha";

    if(!empty($email) AND !empty($senha)){
        //Criptografar
        //echo crypt($senha, PASSWORD_DEFAULT);
        $result_usuario = "SELECT * FROM usuario WHERE email='$email' LIMIT 1";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        if($resultado_usuario){
            $row_usuario = mysqli_fetch_assoc($resultado_usuario);
            if(password_verify($senha, $row_usuario['password'])){
                $_SESSION['id'] = $row_usuario['id'];
                $_SESSION['nome'] = $row_usuario['nome'];
                $_SESSION['email'] = $row_usuario['email'];
                if($_SESSION['id'] == 1){
                    header("Location: administrador.php");
                }else{
                    header("Location: pagina-produtos.php");
                }

            }else{
                $_SESSION['msg'] = "E-mail e/ou senha incorreto(s)";
                header("Location: login.php"); 
            }
        }

    }else{
        $_SESSION['msg'] = "E-mail e/ou senha incorreto(s)";
        header("Location: login.php");  
    }
}else{
    $_SESSION['msg'] = "Assim não";
    header("Location: login.php");  
}

?>