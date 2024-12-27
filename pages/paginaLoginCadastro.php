<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/minha conta.svg" type="image/x-icon">
   <link rel="stylesheet" href="..\css\login_cadastro.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Minha Conta</title>
</head>
<body>
    <header>
        <div class="top">
            <div class="containerTop">
                <ul class="lang">
                    <div class="sociais">
                    <li><a href="#"><img src="../assets/images/redes1.svg"></a></li>
                    <li><a href="#"><img src="../assets/images/redes2.svg"></a></li>
                    <li><a href="#"><img src="../assets/images/redes3.svg"></a></li>
                </div> 
                    <div class="barra_pesquisa">
                    <form method="GET" action="pesquisa.php">
                      <li>   
                    <input type="search" class="input_pesquisa" name="query" placeholder="Ache o seu vinil favorito: (vinil, artista, gênero...)">
                    <button type="submit" class="botao_pesquisa"><img src="../assets/images/pesquisa_img.svg" alt=""></button>
                    </li>
                    </form>
                     </div>
                </ul>
                <div class="botao_container">
                <ul class="botoes_user">
                <li> 
                <a href="
                <?php
                            if (isset($_SESSION['id_cliente'])) {
                                if ($_SESSION['id_cliente'] === 'admin') {
                                    echo 'adm.php';
                                } else {
                                    echo 'minhaConta.php';
                                }
                            } else {
                                echo 'paginaLoginCadastro.php';
                            }
                        ?>">
                            <button class="perfil_usuario">
                                <img src="../assets/images/minha conta.svg">
                                <p>Minha Conta</p>
                            </button>
                        </a>
                </li>
                <li> <button href="#" class="carrinho_compras"><img src="../assets/images/minhas_compras.svg" ><p>Minhas Compras</p></button></li>
                </ul>
                </div>
            </div>
        </div>
        <nav>
            <div class="container_nav">
                <a href="" class="logo">
                    <img src="../assets/images/deja_vu 1.svg" >
                </a>
                <div class="menu-btn">
                    <img src="../assets/images/barraDeMenu.svg" class="menuHamburguer" onclick="menuShow()"></label>
                </div>
                <ul class="menuLista" >
                    <li><a href="../index.php#home" onclick="menuShow()">Home</a></li>
                    <li><a href="../index.php#sobre-nos" onclick="menuShow()">Sobre </a></li>
                    <li><a href="../index.php#contato" class="especial2" onclick="menuShow()">Contato</a></li>
                    <li><a href="../index.php#cards_generosMusicas" class="especial" onclick="menuShow()">Gêneros</a></li> 
                    <li><a href="artistas.php" onclick="menuShow()">Artistas</a></li>
                    <li><a href="vinis_produtos.php" onclick="menuShow()">Vinis</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="form-box login">
            <form action="../php/login.php" method="POST">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="email" placeholder="Email" name="email" id="nome" required> 
                    <i class='bx bxs-envelope' ></i>                
                </div>
                
                <div class="input-box">
                    <input type="password" placeholder="Senha" name="senha" id="senha" required> 
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="lembre_me">
                    <input type="checkbox"><span>Lembre-me</span>
                </div>
                <button type="submit" class="btn">Entrar</button>
            <p>Ou faça login com suas redes sociais!</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google-plus-circle'></i></a>
                    <a href="#"><i class='bx bxl-facebook-circle' ></i></a>
                    <a href="#"><i class='bx bxl-github' ></i></a>
                    <a href="#"><i class='bx bxl-linkedin-square' ></i></a>
                </div>
            </form>
        </div>


        <div class="form-box cadastro">
            <form action="../php/cadastro.php" method = "POST">
                <h1>Cadastro</h1>
                <div class="input-box">
                    <input type="email" placeholder="Email" name = "email" id = "email" required> 
                    <i class='bx bxs-envelope' ></i>
                </div>

                <div class="input-box">
                    <input type="text" placeholder="Nome" name="nome" id="nome" required> 
                    <i class='bx bxs-user'></i>
                </div>
                
                <div class="input-box">
                    <input type="password" placeholder="Senha" name="senha" id="senha" required> 
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <div class="input-box">
                    <input type="text" placeholder="Endereço" name="endereco" id="endereco" required> 
                    <i class='bx bxs-location-plus' ></i>
                </div>
             
                <button type="submit" class="btn">Cadastrar</button>
            <p>Ou cadastre-se com suas redes sociais!</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google-plus-circle'></i></a>
                    <a href="#"><i class='bx bxl-facebook-circle' ></i></a>
                    <a href="#"><i class='bx bxl-github' ></i></a>
                    <a href="#"><i class='bx bxl-linkedin-square' ></i></a>
                </div>
            </form>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Olá, Bem Vindo!</h1><br>
                <p>Não tem uma conta?</p>
                <button class="btn cadastro_btn">Cadastre-se</button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>Bem Vindo <br> de volta!</h1><br>
                <p>Já tem uma conta?</p>
                <button class="btn login_btn">Entrar</button>
            </div>
        </div>
    </div>



    <script src="../js/login_cadastro.js"></script>
</body>
</html>