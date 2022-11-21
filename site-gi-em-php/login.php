<?php
	session_start();
	ob_start();
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Loja de Sapatos | Login </title>
	
	<!-- CSS links -->
	<link rel="stylesheet" type="text/css" href="./css/normalize.css">
	<link rel="stylesheet" href="css/login-style.css">
	
</head>
<body>
<div class="registro-container">
	<header class="header-registro">
		<div class="header-itens">
			<div class="logo">
				<a href=".\index.php" > 
                    <img src=".\img\jordan1.png" />
                </a>
			</div>
			<div class="titulo" id="titulo">
				<h2 class="titulo-login" id="titulo-atual" style="margin-top:20px">Login</h2>
				<!-- <h2 class="titulo-signup hide" style="margin-top:20px">Cadastre-se</h2>
				<h2 class="titulo-forget hide" style="margin-top:20px">Recupere sua senha</h2> -->
			</div>
		</div>
	</header>
    <div class="login-container">
		<div class="login">
			<div class="login-conteudo">

				<?php
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
					if(isset($_SESSION['msgCad'])){
						echo $_SESSION['msgCad'];
						unset($_SESSION['msgCad']);
					}
				?>

				<form name="login-usuario" method="POST" action="valida.php" class="login-form">
					<div class="form-caixa">
						<input type="email" name="email" id="email" class="form-controle" placeholder="E-mail*" required>
					</div>
					<div class="form-caixa">
						<input type="password" name="password" id="password" minlength="8" class="form-controle" placeholder="Senha*" required>
					</div>
					<div class="form-caixa form-flex">
						<div class="w-50">
							<label class="remember-checkbox"><p>Lembrar-me</p>
								<input type="checkbox" checked>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="w-50-right">
							<a id="forget-link" href="javascript:void(0);"><p>Esqueceu a senha?<p></a>
						</div>
					</div>
					<div class="form-enviar">
						<button type="submit" name="fazer-login" value="registro-login" class="btn submit">Entrar</button>
					</div>
					<div class="form-trocar form-flex" style="align-items: center; justify-content: center; margin-top: 10px;">							<p> Não está registrado? </p>
						<a id="signup-link" href="javascript:void(0);" style="text-decoration: black;"> <u> Junte-se a nós.</u> </a>
					</div>
				</form>
			</div>
		</div>
	</div>
    <div class="signup-container hide">
		<div class="signup">
            <div class="signup-conteudo">
                <form name="cadastro-usuario" method="POST" action="./cadastra.php" class="signup-form">
                    <div class="form-caixa">
                        <input type="text" name="nome" id="nome" class="form-controle" placeholder="Nome*" minlength="2" required
						value="<?php 
						if( isset($dados['nome'])){
							echo $dados['nome'];
						}
						?>"
						>
                    </div>
                    <div class="form-caixa">
                        <input type="text" name="cpf" id="cpf" class="form-controle" placeholder="CPF*" minlength="11" maxlength="11" pattern="[0-9]{11}" required
						value="<?php 
						if( isset($dados['cpf'])){
							echo $dados['cpf'];
						}
						?>"
						>
                    </div>
                    <div class="form-caixa">
						<input type="email" name="email" id="email" class="form-controle" placeholder="E-mail*" required
					value="<?php 
						if( isset($dados['email'])){
							echo $dados['email'];
						}
						?>"
						>
                    </div>
                    <div class="form-caixa">
						<input type="password" name="password" id="password" minlength="8" class="form-controle" placeholder="Senha*" required>
                    </div>
                    <div class="form-enviar">
						<button type="submit" name="cadastrar-usuario" value="registro-cadastro" class="btn submit">Enviar</button>
                    </div>
                    <div class="form-trocar form-flex" style="align-items: center; justify-content: center; margin-top: 10px;">
                        <p> Já é cadastrado? </p>
                        <a id="login-link" href="javascript:void(0);" style="text-decoration: black;"> <u> Faça o login.</u> </a>
                    </div>
                </form>
            </div>
		</div>
	</div>
    <div class="forget-container hide">
		<div class="forget">
            <div class="forget-conteudo">
				<form name="recuperar-senha" method="POST" action="" class="forget-form">
					<div class="form-caixa">
						<input type="email" name="email" id="email" class="form-controle" placeholder="E-mail*" required>
					</div>
					<div class="form-enviar">
						<button type="submit" name="trocar-senha" value="verificar-email" class="btn submit">Entrar</button>
					</div>
					<div class="form-trocar form-flex" style="align-items: center; justify-content: center; margin-top: 10px;">
						<a id="back-login-link" href="javascript:void(0);" style="text-decoration: black;"> <u> Voltar </u> </a>
					</div>
				</form>
            </div>
        </div>
	</div>
</div>  

<script type="text/javascript" src="./js/login.js"></script>
</body>

</html>