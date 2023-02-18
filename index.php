<?php
include("conexao.php");
session_start();
session_destroy();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Viga|Outfit|Rokkitt|Oswald|Lexend|">
    <link rel="icon" href="img/logo.svg">
    <link rel="stylesheet" href="css/style.css">
    <title>Notícias</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-between pt-4 pb-2 bg-menu menu align-items-center">
            <div class="col-md-1 col-sm-1 logo2" >
                <a href="index.php"><img src="img/logo.svg" alt="" class="logoImg"></a>
            </div>

            <div class="col-md-5 col-sm-5">
                <div class="row justify-content-center text-center pt-2 pb-3 itens-row ">
                    <div class="col-md-3 col-sm-2 itens titulo text-center"><a href="#">Novidades</a></div>
                    <div class="col-md-2 col-sm-2 itens titulo text-center"><a href="#">Cozinha</a></div>
                    <div class="col-md-2 col-sm-2 itens titulo text-center"><a href="#">Esporte</a></div>
                    <div class="col-md-2 col-sm-2 itens titulo text-center"><a href="#">Religião</a></div>
                    <div class="col-md-2 col-sm-2 itens titulo text-center"><a href="#">Saúde</a></div>
                </div>
            </div>

            <div class="col-md-1 col-sm-2 text-center botao">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-cor botao-login bg-btn-login" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <span class="login-btn">Login</span>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header justify-content-center btn-cor">
                                <h5 class="modal-title " id="exampleModalLabel">Login</h5>
                            </div>
                            <form action="login.php" method="POST">
                                <div class="modal-body">
                                    <input type="text" name="usuario" placeholder="Digite seu usuário" class="form-control">
                                    <input type="text" name="senha" placeholder="Digite sua senha" class="form-control mt-3">
                                </div>
                                <div class="modal-footer justify-content-center btn-cadastrar">
                                    <input type="submit" class="btn btn-cor2" data-bs-dismiss="modal" value="Login">
                                    <a href="form_user.php" class="btn btn-cor">Cadastre-se</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide teste" data-bs-ride="true">
            
                <div class="carousel-indicators novidades hidden">
                
                    <?php
                    $controle_ativo = 0;

                    $resultado_carousel = "SELECT * FROM noticias ORDER BY id DESC";
                    $sql_carousel = mysqli_query($conn, $resultado_carousel);

                    while ($row = mysqli_fetch_assoc($sql_carousel)) {
                        $controle_ativo =  $controle_ativo + 1;
                        if ($controle_ativo == 1) {
                    ?>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <?php
                        } else {
                        ?>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $controle_ativo - 1 ?>" aria-label="Slide <?php echo $controle_ativo ?>"></button>
                    <?php

                        }
                    }

                    ?>
                </div>

                <div class="carousel-inner linear-carousel" role="listbox">
                
                
                        <?php

                    $resultado_carousel = "SELECT * FROM noticias ORDER BY id DESC";
                    $sql_carousel = mysqli_query($conn, $resultado_carousel);
                    $controle_ativo2 = 0;

                    while ($row = mysqli_fetch_assoc($sql_carousel)) {
                        $controle_ativo2 =  $controle_ativo2 + 1;

                        if ($controle_ativo2 == 1) {
                    ?>

                            <div class="carousel-item active">
                                <img src="<?php echo 'img/' . $row['img']; ?>" class="d-block w-100">
                                <div class="carousel-caption bg-caption d-md-block p-5">
                                    <h1><?php echo $row['titulo']; ?></h1>
                                </div>
                            </div>

                        <?php
                        } else {
                        ?>
                            <div class="carousel-item">
                                <img src="<?php echo 'img/' . $row['img']; ?>" class="d-block w-100">
                                <div class="carousel-caption bg-caption d-md-block p-5">
                                    <h1><?php echo $row['titulo']; ?></h1>
                                </div>
                            </div>


                    <?php
                        }
                    }
                    ?>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
        </div>

        <div class="row justify-content-around row-cols-1 row-cols-md-2 g-4 cards">

            <?php

            $sql_noticias = "SELECT * FROM noticias ORDER BY id DESC";
            $resultado_noticias = mysqli_query($conn, $sql_noticias);

            $cont = 0;

            while (( $noticias = mysqli_fetch_assoc($resultado_noticias)) && ($cont < 3)) {
            ?>
                <div class="col-md-4 col-sm-10 tam2">
                    <div class="card">
                        <img src="img/<?php echo $noticias['img']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center titulo"><?php echo $noticias['titulo']; ?></h5>
                            <p class="card-text noticia"><?php echo $noticias['noticia']; ?></p>
                        </div>
                    </div>
                </div>

            <?php
                $cont++;
            }
            ?>

        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-11 pb-4 mt-5">
                <h3 class="card-title novidades mt-5"> Novidades </h3>
                <hr class="nov">
            </div>
        </div>

        
        <?php

        $sql_noticias = "SELECT * FROM noticias ORDER BY id DESC";
        $resultado_noticias = mysqli_query($conn, $sql_noticias);


        while (($noticias = mysqli_fetch_assoc($resultado_noticias))) {
        ?>
            <div class="row mt-5 mb-5 justify-content-center ">
                <div class="col-md-5 mt-5 mb-5 col-sm-5">
                    <img src="<?php echo 'img/' . $noticias['img']; ?>" class="rounded img-fluid" alt="...">
                </div>

                <div class="col-md-5 col-sm-5 mt-5 mb-5 ps-3 pe-3">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-sm-12 mt-3">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 cat text-center"><?php echo $noticias['categoria']; ?></div>
                                <div class="col-md-4 col-sm-6 data"><?php echo $noticias['data_noticia']; ?></div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 mt-3">
                            <h3 class="titulo"><?php echo $noticias['titulo']; ?></h3>
                            <hr class="linha2">
                        </div>
                        <div class="col-md-12 col-sm-12 mt-3">
                            <p class="noticia"><?php echo $noticias['noticia']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>



        <div class="row footer bg-footer ">
            <footer class="site-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <h6>Sobre</h6>
                            <p class="text-justify">
                                SimoNews é um site de notícias criado por alunos do SENAI Registro que
                                se deu início como um simples projeto. O foco do SimoNews é trazer
                                variadas notícias da forma mais clara possível
                            </p>
                        </div>

                        <div class="col-xs-6 col-md-3">
                            <h6>Categorias</h6>
                            <ul class="footer-links">
                                <li><a href="#">Entretenimento</a></li>
                                <li><a href="#">Tecnologia</a></li>
                                <li><a href="#">Saúde</a></li>
                                <li><a href="#">Regional</a></li>
                                <li><a href="#">Brasil</a></li>
                                <li><a href="#">Internacional</a></li>
                                <li><a href="#">Política</a></li>
                            </ul>
                        </div>

                        <div class="col-xs-6 col-md-3">
                            <h6>Atendimento</h6>
                            <ul class="footer-links">
                                <li><a href="#">Sobre nós</a></li>
                                <li><a href="#">Fale conosco</a></li>
                                <li><a href="#">Trabalhe conosco</a></li>
                                <li><a href="#">Política de privacidade</a></li>
                                <li><a href="#">Termos de Uso</a></li>
                            </ul>
                        </div>
                    </div>
                    <hr />
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <p class="copyright-text">
                                Copyright &copy; 2022-2022 Todos os direitos reservados por
                                <a href="#">SimoNews</a>
                            </p>
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <ul class="social-icons">
                                <li>
                                    <a class="facebook" href="#"><i class="bi bi-facebook"></i></a>
                                </li>
                                <li>
                                    <a class="twitter" href="#"><i class="bi bi-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>







    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>