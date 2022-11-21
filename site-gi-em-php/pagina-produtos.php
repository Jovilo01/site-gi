<?php
    session_start();
    include_once './conexao.php';

    $produtos = "SELECT * FROM ((((produtotamanho INNER JOIN produto ON produtotamanho.idProduto = produto.idProduto)
                            INNER JOIN tamanho ON produtotamanho.idTamanho = tamanho.idTamanho)
                            INNER JOIN marca ON produto.idMarca = marca.idMarca)
                            INNER JOIN estilo ON produto.idEstilo = estilo.idEstilo) 
                        ";
    $result_produto = mysqli_query($conn, $produtos);

    while ($dataprod = mysqli_fetch_assoc($result_produto)){
    $array_list_produto[] = $dataprod;
    }

    $dados_array = json_encode($array_list_produto);
    file_put_contents('produtos.json', $dados_array);

?>
<!-- Enviar JSON ^-->

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Sapatos</title>

    <!-- CSS links -->
    <link rel="stylesheet" type="text/css" href="./css/normalize.css">
    <link rel="stylesheet" type="text/css" href="./css/product-page.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
</head>
<body>
    <div class="header-holder">
        <header>
            <div class="navigation">
                <div class="nav-main">
                    <div class="nav-logo">
                        <a href=".\index.php" > 
                            <img src=".\img\jordan1.png" />
                        </a>
                    </div>
                    <div class="nav-menu">
                        <nav class="nav"> 
                            <ul class="nav-options">
                                <li><a href="./pagina-produtos.php" title="sapato1" >sapato1</a></li>
                                <li><a href="" title="sapato2" >sapato2</a></li>
                                <li><a href="" title="sapato3" >sapato3</a></li>
                                <li><a href="" title="sapato4" >sapato4</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="nav-settings">
                    <div class="nav-search" style="display: flex; margin-right: 25px;">
                        <input type="search" placeholder="Busque...">
                        <button class="search-button" type="button"> <img src="./img/search.png" alt="" height="21px" width="21px"/> </button>
                    </div>
                    <div class="nav-user-options">
                        <div>
                            <a href=""> <img src="./img/chat.png" alt="" title="chat" height="25px" width="25px"/></a>
                        </div>
                        <div>
                            <a href="./login.php"> <img src="./img/login.png" alt="" title="login" height="25px" width="25px"/></a>
                        </div>
                        <div>
                            <a href=""> <img src="./img/shopping.png" alt="" title="carrinho" height="25px" width="25px"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>  
    <div class="page-container" id="page-container">
        <div class="filters-info">
            <!-- imprimir o nome da pesquisa, a quantidade achada e ordenar (se quiser um botão pra mostrar os filtros ou esconder) -->
        </div>
        <div class="filter-and-produtcs">
            <div class="filters">
                <div class="filters-options">
                    <ul class="filter-list" id="filter-list"></ul>
                    <!-- tamanho, cor e preço ta bom -->
                    <!-- <div class="filter"></div>
                    <div class="filter"></div>
                    <div class="filter"></div> -->
                </div>
            </div>
            <div class="products-container">
                <div class="products" id="products"></div>
            </div>
        </div>
    </div>
    <h1>Carrinho</h1>
    <div class="carrinho" id="carrinho">
    </div>
    <div class="the-footer">
        <footer>
            <div class="footer-box" style="width: 100%; max-width: 1180px; margin: 0px auto;">
                <div class="footer-menu">
                    <div class="columms" style="display: flex; width: 45%; justify-content: space-between;">
                        <div class="footer-nav-columm">
                            <h3>Sobre nós</h3>
                            <ul class="footer-list">
                                <li class="footer-list-item"> 
                                    <a href=""> Quem somos </a>
                                </li>
                                <li class="footer-list-item"> 
                                    <a href=""> Política de privacidade </a>
                                </li>
                                <li class="footer-list-item"> 
                                    <a href=""> Termo de uso </a>
                                </li>    
                                <li class="footer-list-item"> 
                                    <a href=""> Sustentabilidade </a>
                                </li>     
                            </ul>
                        </div>
                        <div class="footer-nav-columm">
                            <h3>Procurando ajuda</h3>
                            <ul class="footer-list">
                                <li class="footer-list-item"> 
                                    <a href=""> Dúvidas gerais </a>
                                </li>
                                <li class="footer-list-item"> 
                                    <a href=""> Trocas e devolução </a>
                                </li>
                                <li class="footer-list-item"> 
                                    <a href=""> Central de atendimento </a>
                                </li>         
                            </ul>
                        </div>
                    </div>
                    <div class="footer-nav-columm">
                            <h3>Inscreva-se para ficar por dentro das novidades</h3>
                            <ul class="footer-list">
                                <li class="footer-list-item"> 
                                    <div class="email-notification" style="display: flex; margin-right: 25px;">
                                        <input type="email" name="email" id="email" placeholder="seu e-mail" style="width: 280px; border: 1px solid transparent;"/>
                                        <button class="email-notification-button" type="button"> Enviar </button>
                                    </div>
                                </li>     
                            </ul>
                            <h3>Siga-nos</h3>
                            <ul class="footer-list">
                                <li class="footer-list-item"> 
                                    <a href="">
                                        <div class="footer-img-boxes">
                                        <img src="" alt=""/>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="footer-img-boxes">
                                        <img src="" alt=""/>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="footer-img-boxes">
                                        <img src="" alt=""/>
                                        </div>
                                    </a>
                                </li>     
                            </ul>
                            <h3>Formas de pagamento</h3>
                            <ul class="footer-list">
                                <li class="footer-list-item"> 
                                    <a href="">
                                        <div class="footer-img-boxes">
                                        <img src="" alt=""/>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="footer-img-boxes">
                                        <img src="" alt=""/>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="footer-img-boxes">
                                        <img src="" alt=""/>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="footer-img-boxes">
                                        <img src="" alt=""/>
                                        </div>
                                    </a>
                                </li>     
                            </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script>    

        $(document).ready(function(){
            //puxar itens
            $.ajax({    
                url: "produtos.json",
                method: 'GET',
                dataType: 'json',
                success: function(data){
                    console.log(data); 
                    
                    var containerProdutos = document.getElementById('products');

                    for(var i = 0; i < data.length; i++){
                        $(containerProdutos).prepend(
                        `
                        <div class="product-item">
                        <img src="`+data[i].imagem+`"/>
                        <a src="`+data[i].nome+`" />
                        `+data[i].nome+` |
                        `+data[i].modelo+`<br>
                        Cor: `+data[i].cor+`
                        <p> R$ `+data[i].preco+`</p>
                        <a key="`+data[i].idProduto+`" href="javascript:void(0);"> adicionar ao carrinho </a>
                        `);
                    }
                }
            });

            //Fazer filto
        });

        const filtros = [
            {
                filtro: "Tamanhos"
            },
            {
                filtro: "Cor"
            },
            {
                filtro: "Faixa de preço"
            }
        ]

        filtrosdisp = () => {
            var containerProdutos = document.getElementById('filter-list');
            filtros.map((vaL)=>{
                console.log(vaL)
                containerProdutos.innerHTML += 
                `
                    <div class="filter">
                    <li>`+vaL.filtro+`</li>
                    </div>
                `;
            })

        }

        filtrosdisp();

        atualizarcarrinho = () => {
            var containerCarrinho = document.getElementById('carrinho');
            containerCarrinho.innerHTML = ""
            items.map((vaL)=>{
                if(vaL.quantidade > 0){
                    containerCarrinho.innerHTML += 
                    `
                        <p> `+vaL.nome+` | quantidade: `+vaL.quantidade+` </p>

                    `;
                }
            })
        }

        var links = document.getElementsByTagName("a");
        for(var i = 0; i < links.length; i++){
            links[i].addEventListener('click', function(){
                let key = this.getAttribute("key");
                items[key].quantidade++;
                atualizarcarrinho();
            })
        }
    </script>

</body>
</html>