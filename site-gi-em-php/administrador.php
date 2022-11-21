<?php
session_start();
ob_start();
include_once './conexao.php';

if(!empty($_SESSION['id']==1)){
    echo "Olá ".$_SESSION['nome'].", seja bem vindo novamente! <br>";
    echo "<a href='sair.php'>sair</a><br>";
}else{
    $_SESSION['msg'] = "IH";
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sala do Administrador</title>

    <style>
        .est{
            margin: 0 auto;
        }     
        p{
            font-size: 19px;
        }   
    </style>

</head>
<body>
    <?php  //cadastrar produto
        $btnCadastro = filter_input(INPUT_POST, 'cadastrar-produto');
        if($btnCadastro){
            //Dados recebidos
            $dados_rc = filter_input_array(INPUT_POST,FILTER_DEFAULT);
            // $dados_rc['preco'] = number_format($dados_rc['preco'], 2, ',', '.');
        
            $erro = false;
            //Dados filtrados
            $dados_st = array_map('strip_tags', $dados_rc);
            $dados_st['modelo'] = filter_input(INPUT_POST, 'modelo',FILTER_SANITIZE_SPECIAL_CHARS);
            $dados_st['cor'] = filter_input(INPUT_POST, 'cor',FILTER_SANITIZE_SPECIAL_CHARS);
            
            $dados = array_map('trim', $dados_st);
            $dados['preco'] = floatval($dados['preco']);
            $dados['marca'] = intval($dados['marca']);
            $dados['categoria'] = intval($dados['categoria']);
            var_dump($dados);
            if(in_array('',$dados)){
                $erro = true;
                $_SESSION['msgCad'] = "Preencha corretamente, sem espaços vazios!";
            }else{
                $result_prod = "SELECT idProduto FROM produto WHERE modelo ='".$dados['modelo']."' 
                AND cor = '".$dados['cor']."' ";
                $resultado_prod = mysqli_query($conn, $result_prod);
                if(($resultado_prod) AND ($resultado_prod->num_rows != 0)){
                    $erro = true;
                    $_SESSION['msgCad'] = "Modelo já cadastrado!";
                }
            }
        
            if(!$erro){
                //var_dump($dados);
                $result_prod = "INSERT INTO produto (modelo, preco, idMarca, cor, idEstilo) VALUES (
                                '".$dados['modelo']."',
                                '".$dados['preco']."',
                                '".$dados['marca']."',
                                '".$dados['cor']."',
                                '".$dados['categoria']."'
                                )";

                $resultado_prod = mysqli_query($conn, $result_prod);
                
                if(mysqli_insert_id($conn)){
                    $_SESSION['msgCad'] = "Cadastrado com sucesso!";
                    header("Location: administrador.php"); 
                    die();
                }else{
                    $_SESSION['msgCad'] = "Algo deu errado, tente novamente!";
                }
            }
        }
    ?>

    <?php   //cadastrar estoque
        $btnEstoque = filter_input(INPUT_POST, 'cadastrar-estoque');
        if($btnEstoque){
            //Dados recebidos
            $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT); 
            $erro = false;

            $dados['modelosreg'] = intval($dados['modelosreg']);
            $dados['tamanho'] = intval($dados['tamanho']);
            $dados['estoque'] = intval($dados['estoque']);
            var_dump($dados);

            if(in_array('',$dados)){
                $erro = true;
                $_SESSION['msgCad'] = "Preencha corretamente, sem espaços vazios!";
            }
            
            if(!$erro){
                $result_prod = "SELECT idProdutoTamanho FROM produtotamanho 
                                WHERE idProduto ='".$dados['modelosreg']."' 
                                AND idTamanho = '".$dados['tamanho']."' 
                                ";
                $resultado_prod = mysqli_query($conn, $result_prod);
                if(($resultado_prod) AND ($resultado_prod->num_rows != 0)){

                    $result_estoque = "UPDATE produtotamanho set estoque = estoque + '".$dados['estoque']."'
                                       WHERE idProduto ='".$dados['modelosreg']."' 
                                       AND idTamanho = '".$dados['tamanho']."'
                                       ";
                    $resultado_prod = mysqli_query($conn, $result_estoque);

                    if(mysqli_insert_id($conn)){
                        $_SESSION['msgCad'] = "Estoque atualizado!";
                        header("Location: administrador.php");
                    }
                }else{
                    //var_dump($dados);
                    $result_prod = "INSERT INTO produtotamanho (idProduto, idTamanho, estoque) VALUES (
                                    '".$dados['modelosreg']."',
                                    '".$dados['tamanho']."',
                                    '".$dados['estoque']."'
                                    )";

                    $resultado_prod = mysqli_query($conn, $result_prod);
                    
                    if(mysqli_insert_id($conn)){
                        $_SESSION['msgCad'] = "Estoque cadastrado com sucesso!";
                        header("Location: administrador.php"); 
                    }else{
                        $_SESSION['msgCad'] = "Algo deu errado, tente novamente!";
                        header("Location: administrador.php"); 
                    }
                }
            }
        }
    ?>

    <?php   //deletar modelo
        $btnDelete = filter_input(INPUT_POST, 'deletar-produto');
        if($btnDelete){
            //Dados recebidos         
            $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
            $dados['modelosreg'] = intval($dados['modelosreg']);
            var_dump($dados);

            $result_prod = "DELETE FROM produto WHERE idProduto = '".$dados['modelosreg']."' LIMIT 1";
            $resultado_prod = mysqli_query($conn, $result_prod);

            if(mysqli_affected_rows($conn)){
                $_SESSION['msgCad'] = "Deletado!";
                header("Location: administrador.php"); 
            }else{
                $_SESSION['msgCad'] = "Algo deu errado, tente novamente!";
                header("Location: administrador.php"); 
            }
        }
    ?>

    <?php   //enviar foto
        $btnImg = filter_input(INPUT_POST, 'enviar-foto');
        if($btnImg){
            $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT); 

            $dados['modelosregis'] = filter_input(INPUT_POST, 'modelosregis',FILTER_SANITIZE_SPECIAL_CHARS);

            $arquivo 	= $_FILES['arquivo']['name'];
			
			//Pasta onde o arquivo vai ser salvo
			$_UP['pasta'] = './';
			
			//Tamanho máximo do arquivo em Bytes
			$_UP['tamanho'] = 1024*1024*100; //5mb
			
			//Array com a extensões permitidas
			$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');
			
			//Renomeiar
			$_UP['renomeia'] = false;
			
			//Array com os tipos de erros de upload do PHP
			$_UP['erros'][0] = 'Não houve erro';
			$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
			$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
			
			//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
			if($_FILES['arquivo']['error'] != 0){
				die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
				exit; //Para a execução do script
			}
			
			//Faz a verificação da extensao do arquivo
			$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
			if(array_search($extensao, $_UP['extensoes'])=== false){		
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/site-gi-em-php/administrador.php'>
					<script type=\"text/javascript\">
						alert(\"A imagem não foi cadastrada extesão inválida.\");
					</script>
				";
			}
			
			//Faz a verificação do tamanho do arquivo
			else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/site-gi-em-php/administrador.php'>
					<script type=\"text/javascript\">
						alert(\"Arquivo muito grande.\");
					</script>
				";
			}
			
			//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
			else{
				//Primeiro verifica se deve trocar o nome do arquivo
				if($UP['renomeia'] == true){
					//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
					$nome_final = time().'.jpg';
				}else{
					//mantem o nome original do arquivo
					$nome_final = $_FILES['arquivo']['name'];
				}
				//Verificar se é possivel mover o arquivo para a pasta escolhida
				if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
					//Upload efetuado com sucesso, exibe a mensagem
					$query = mysqli_query($conn, " UPDATE produto set imagem = '$nome_final'
                                                   WHERE idProduto = '".$dados['modelosregis']."' 
                                                 ");
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/site-gi-em-php/administrador.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem cadastrada com Sucesso.\");
						</script>
					";	
				}else{
					//Upload não efetuado com sucesso, exibe a mensagem
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/site-gi-em-php/administrador.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem não foi cadastrada com Sucesso.\");
						</script>
					";
				}
			}
        }
    ?>

    <div class="container" style="margin:0 auto; display:flex; align-items: center; flex-direction: column;">
        <?php   //mensagens
            if(isset($_SESSION['msgCad'])){
                echo $_SESSION['msgCad'];
                unset($_SESSION['msgCad']);
            }
        ?>
        <!-- Formulário de cadastro -->
        <div class="produto" style="display:flex; justify-content: center;">
            <form method="POST" class="cadastro-produto">
                <input type="text" name="modelo" id="modelo" class="form-box" placeholder="Modelo*" required>
                <input type="number" step=".01" name="preco" id="preco" class="form-box" placeholder="Preço*" required>
                <input type="text" name="cor" id="cor" class="form-box" placeholder="Cor">
                <label class="marcas">
                    <select name="marca">
                        <option>Selecione a marca</option>
                        <?php
                            $contar_marcas = "SELECT * FROM marca";
                            $resultado_marcas = mysqli_query($conn, $contar_marcas);
                            while($marcas = mysqli_fetch_array($resultado_marcas)):?>
                        <option value="<?=$marcas['idMarca']?>"> <?=$marcas['nome']?> </option>
                        <?php endwhile ?>
                    </select>
                </label>
                <label class="categorias">
                    <select name="categoria">
                        <option>Selecione a categoria</option>
                        <?php
                            $contar_estilos = "SELECT * FROM estilo";
                            $resultado_estilo = mysqli_query($conn, $contar_estilos);
                            while($categoria = mysqli_fetch_array($resultado_estilo)):?>
                        <option value="<?=$categoria['idEstilo']?>"> <?=$categoria['categoria']?> </option>
                        <?php endwhile ?>
                    </select>
                </label>
                <button type="submit" name="cadastrar-produto" value="cadastro-registro" class="btn submit">Enviar</button>
            </form><br>
        </div>

        <!-- Formulário de estoque e Deletar -->
        <div class="estoque" style="display:flex; justify-content: center;">
            <form method="POST" class="cadastro-estoque">
                <label> Modelo:
                    <select name="modelosreg" style="width:270px;">
                        <option>Modelos</option>
                        <?php
                            $contar_prod = "SELECT * FROM produto ORDER BY modelo ASC";
                            $resultado_prod = mysqli_query($conn, $contar_prod);
                            while($prods = mysqli_fetch_array($resultado_prod)):?>
                        <option value="<?=$prods['idProduto']?>"> <?=$prods['modelo']?> - <?=$prods['cor']?> </option>
                        <?php endwhile ?>
                    </select>
                </label>
                <label> Tamanho:
                    <select name="tamanho" style="width:80px;">
                        <option>Medidas</option>
                        <?php
                            $contar_tamanho = "SELECT * FROM tamanho";
                            $resultado_tamanho = mysqli_query($conn, $contar_tamanho);
                            while($tamanhos = mysqli_fetch_array($resultado_tamanho)):?>
                        <option value="<?=$tamanhos['idTamanho']?>"> <?=$tamanhos['medida']?> </option>
                        <?php endwhile ?>
                    </select>
                </label>
                <label> Estoque:
                <input type="number" name="estoque" id="estoque" class="form-box" placeholder="Quantidade*" min="1">
                </label>
                <button type="submit" name="cadastrar-estoque" value="cadastro-estoque" class="btn submit">Enviar</button>
                <button type="submit" name="deletar-produto" value="deletado-registro" class="btn submit">Deletar o modelo</button>
            </form>
        </div>

        <!-- Imagens -->
        <div class="Foto" style="display:flex; justify-content: center;">
            <form method="POST" enctype="multipart/form-data">
                <label> Modelo:
                    <select name="modelosregis" style="width:270px;">
                        <option>Modelos</option>
                        <?php
                            $contar_prod = "SELECT * FROM produto ORDER BY modelo ASC";
                            $resultado_prod = mysqli_query($conn, $contar_prod);
                            while($prods = mysqli_fetch_array($resultado_prod)):?>
                        <option value="<?=$prods['idProduto']?>"> <?=$prods['modelo']?> - <?=$prods['cor']?> </option>
                        <?php endwhile ?>
                    </select>
                </label>
                <label> Arquivo: </label>
                <input type="file" required name="arquivo">
                <input type="submit" name="enviar-foto" value="Salvar">
            </form>
        </div>

        <!-- paginação -->
        <div class="paginacao" style="display:flex; justify-content: center; flex-direction: column;" >
            <?php  
                $pagina_atual = filter_input(INPUT_GET,'pagina',FILTER_SANITIZE_NUMBER_INT);
                $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

                //Setar a quantidade de itens por página
                $qnt_result_pg = 5;

                //calcular o inicio visualização
                $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

                $produtos = "SELECT * FROM (((produtotamanho INNER JOIN produto ON produtotamanho.idProduto = produto.idProduto)
                            INNER JOIN tamanho ON produtotamanho.idTamanho = tamanho.idTamanho)
                            INNER JOIN marca ON produto.idMarca = marca.idMarca) 
                            LIMIT $inicio, $qnt_result_pg";
                //$produtos = "SELECT * FROM ((produto INNER JOIN marca ON produto.idMarca = marca.idMarca)
                //INNER JOIN estilo ON produto.idEstilo = estilo.idEstilo) LIMIT $inicio, $qnt_result_pg";
                $resultado_produtos = mysqli_query($conn, $produtos);
                echo "<label class=est><h2> Estoque </h2></label>";
                while($row_produtos = mysqli_fetch_assoc($resultado_produtos)){
                    echo "
                        <div class=listinha><p>
                        ID: ".$row_produtos['idProduto']." - ".$row_produtos['nome']." ".$row_produtos['modelo']."  ".$row_produtos['cor']." 
                        </p></div>
                        <div class=listinha> Tamanho: ".$row_produtos['medida']." </div>
                        <div class=listinha> Quantidade em estoque: ".$row_produtos['estoque']." </div><br><br>"
                    ;
                }
            ?>
            <div class="paginas" style="margin: 0 auto;">
            <?php   //Páginas em rodapé
                //Paginação - Somar a quantidade de usuários
                $result_pg = "SELECT COUNT(idProduto) AS num_result FROM produto";
                $resultado_pg = mysqli_query($conn, $result_pg);
                $row_pg = mysqli_fetch_assoc($resultado_pg);
                //echo $row_pg ['num_result'];

                //Quantidade de paginas
                $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

                //Limitar os links
                $max_links = 2;  
                
                //rodapézinho
                echo "<a href='administrador.php?pagina=1'>Início</a>";

                for($pag_ant = $pagina-$max_links; $pag_ant<=$pagina - 1; $pag_ant++){
                    if($pag_ant>=1){
                    echo "<a href='administrador.php?pagina=$pag_ant'>$pag_ant </a>";
                    }
                }

                echo (" $pagina ");

                for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                    if($pag_dep <= $quantidade_pg){
                        echo "<a href='administrador.php?pagina=$pag_dep'>$pag_dep </a>";
                    }
                }

                echo "<a href='administrador.php?pagina=$quantidade_pg'>Final </a>";


            ?>
            </div>
        </div>
    </div>
</body>
    
</html>