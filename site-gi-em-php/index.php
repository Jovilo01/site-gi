<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Sapatos</title>

    <!-- CSS links -->
    <link rel="stylesheet" type="text/css" href="./css/normalize.css">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="./css/slider-style.css">
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
                                <li><a href="./pagina-produtos.php" title="sapato1" >Lista de produtos</a></li>
                                <li><a href="" title="sapato2" >Item 2</a></li>
                                <li><a href="" title="sapato3" >Item 3</a></li>
                                <li><a href="" title="sapato4" >Item 4</a></li>
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
                            <a href="sair.php"> <img src="./img/login.png" alt="" title="login" height="25px" width="25px"/></a>
                        </div>
                        <div>
                            <a href=""> <img src="./img/shopping.png" alt="" title="carrinho" height="25px" width="25px"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>    
    <div class="slider">
        <div class="container">
            <div class="gallery-wrapper">
                <!-- bottons -->
                <button class="next control" aria-label="next button">  </button>
                <button class="previous control" aria-label="previous button"> </button>
                <!-- photos -->
                <div class="gallery">
                    <!-- First item -->
                    <img class="item " src="./img/slide/1.jpg" alt="" />
                    <img class="item " src="./img/slide/2.jpg" alt="" />
                    <img class="item " src="./img/slide/3.jpg" alt="" />
                    <img class="item " src="./img/slide/4.jpg" alt="" />
                    <!-- Last item -->
                </div>
            </div>
        </div>
    </div>
    <div class="works">
        <div class="work">
            <h1> Entrega de confiança </h1>
            <p> Próprio sistema  de entrega, sla </p>
        </div>
        <div class="work" style=" margin-top: 50px;">
            <h1> Produtos oficiais </h1>
            <p> Revendedora autorizada, sla </p>
        </div>
        <div class="work">
            <h1> Segurança </h1>
            <p> Sigilo de dados, sla </p>
        </div>
    </div>
    <div class="last-checked" style="max-width: 1180px; margin: 0px auto; margin-bottom: 20px;">
        
        <h1> <span>Vistos recentimente</span> </h1>
        <div class="boxes">
            <div class="box">
                
            </div>
            <div class="box">
                
            </div>
            <div class="box">
                
            </div>
            <div class="box">
                
            </div>
        </div>
    </div>
    <div class="sample" style="max-width: 1180px; margin: 0px auto;">
        <h1> <span>Categorias</span> </h1>
        <div class="categories">
            <div class="category">
                <a href="" title="sapato1" >item 1</a>
            </div>
            <div class="category">
                <a href="" title="sapato1" >item 2</a>
            </div>
            <div class="category">
                <a href="" title="sapato1" >item 3</a>
            </div>
            <div class="category">
                <a href="" title="sapato1" >item 4</a>
            </div>
            <div class="category">
                <a href="" title="sapato1" >item 5</a>
            </div>
            <div class="category">
                <a href="" title="sapato1" >item 6</a>
            </div>
        </div>
    </div>
    <div class="news" style="max-width: 1180px; margin: 0px auto;">
        <h1> <span>Novidades</span> </h1>
        <div class="boxes">
            <div class="box">
                
            </div>
            <div class="box">
                
            </div>
            <div class="box">
                
            </div>
            <div class="box">
                
            </div>
        </div>
    </div>
    <div class="brands">
        <div class="brand">
            <h1> <a href="" title="adidas" > adidas </a>  </h1>
        </div>
        <div class="brand">
            <h1> <a href="" title="nike" > nike </a> </h1>
        </div>
        <div class="brand">
            <h1> <a href="" title="puma" > puma </a> </h1>
        </div>
        <div class="brand">
            <h1> <a href="" title="vans" > vans </a> </h1>
        </div>
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
</body>
<!-- JS links -->
<script type="text/javascript" src="./js/meu-slider.js"></script>

</html>
    <!-- prohximo passos são fazer, (f=feito):
    -slider (f) -> 
    -trabalhos (f)
    -caixa com marcas vendidas (f)
    -fazer uma tabela de destaques, mais vendidos ou vistos recentimentes (f) 0> se n for difihcil
    -rodapé (f)
    -Barra lateral ()
    -ajudar o  slider () Slide tem que mudar o scrollintoview que ta dando umas bugadas e o primeiro slide ta contando errado, começa do terceiro
    -responsividade ()
    -adaptar os link ()
    -fazer função para os botões de enviar e pesquisa também () 
    -mudar nome da loja () -->