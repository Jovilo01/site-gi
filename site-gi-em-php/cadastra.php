<?php
session_start();
include_once './conexao.php';

$btnCadastro = filter_input(INPUT_POST, 'cadastrar-usuario');
if($btnCadastro){
    $dados_rc = filter_input_array(INPUT_POST,FILTER_DEFAULT);

    $erro = false;
    
    $dados_st = array_map('strip_tags', $dados_rc);
    $dados_st['nome'] = filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_SPECIAL_CHARS);
    $dados_st['cpf'] = filter_input(INPUT_POST, 'cpf',FILTER_SANITIZE_SPECIAL_CHARS);
    $dados_st['email'] = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);

    $dados = array_map('trim', $dados_st);
    var_dump($dados);
    if(in_array('',$dados)){
        $erro = true;
        $_SESSION['msgCad'] = "Preencha corretamente, sem espaços vazios!";
    }elseif((stristr($dados['password'], "'"))){
        $erro = true;
        $_SESSION['msgCad'] = "Não pode ter (') na senha ";
    }else{
        $result_usuario = "SELECT id FROM usuario WHERE email ='".$dados['email']."' ";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
            $erro = true;
            $_SESSION['msgCad'] = "E-mail já cadastrado!";
        }
    }

    if(!$erro){
    // var_dump($dados);
        $dados['password'] = crypt($dados['password'],PASSWORD_DEFAULT);
        $result_usuario = "INSERT INTO usuario (nome, email, cpf, password) VALUES (
                        '".$dados['nome']."',
                        '".$dados['email']."',
                        '".$dados['cpf']."',
                        '".$dados['password']."'
                        )";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        if(mysqli_insert_id($conn)){
            $_SESSION['msgCad'] = "Cadastrado com sucesso!";
            header("Location: login.php");  
        }else{
            $_SESSION['msgCad'] = "Algo deu errado, tente novamente!";
            header("Location: login.php"); 
        }
    }
}else{
    $_SESSION['msg'] = "Assim não";
    header("Location: login.php");  
}
?>