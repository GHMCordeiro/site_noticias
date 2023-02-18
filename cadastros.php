<?php
include('conexao.php');
$sql = "SELECT * FROM noticias";
$result = $conn->query($sql);

session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: index.php');
    exit();
}

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
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/logo.png">
    <title>Notícias</title>
</head>

<body>


    <div class="container-fluid">
        <div class="row justify-content-between pt-4 pb-2 bg-menu">
            <div class="col-md-2 col-sm-2 logo2"> 
               <a href="tela_logado.php"><img src="img/logo.svg" alt="" class="logoImg"></a>
            </div>

            <div class="col-md-2 col-sm-6 botao2 ">
                <div class="row justify-content-around logado">
                    <div class="col-md-2 col-sm-5 tam ">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-cad bg-btn-login " data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Cadastrar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center ">
                                        <h5 class="modal-title cad-titulo" id="exampleModalLabel">Cadastro</h5>
                                    </div>
                                    <form action="cadastrar.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="text" name="titulo" placeholder="Título da notícia" class="form-control">
                                            <input type="text" name="noticia" placeholder="Digite a notícia" class="form-control mt-3">
                                            <input type="text" name="categoria" placeholder="Digite a categoria" class="form-control mt-3">
                                            <input type="date" name="data_noticia" class="form-control mt-3">
                                            <input type="file" name="arquivo" class="form-control mt-3">
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <input type="submit" class="btn btn-primary" data-bs-dismiss="modal" value="Cadastrar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-3 tam">
                        <a href="index.php" class="btn btn-logout">Sair</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3 border ">
            <div class="col-md-12 col-sm-12 cadastros">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Título</th>
                            <th scope="col">Notícia</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Data</th>
                            <th class="col">...</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($dado = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $dado['id'] . "</td>";
                            echo "<td>" . $dado['titulo'] . "</td>";
                            echo "<td>" . $dado['noticia'] . "</td>";
                            echo "<td>" . $dado['categoria'] . "</td>";
                            echo "<td>" . $dado['data_noticia'] . "</td>";
                            echo "<td> 
                                    <a href='edit.php?id=$dado[id]' class='btn btn-primary bi bi-pencil' ></a>
                                    <a href='delete.php?id=$dado[id]' class='btn btn-danger bi bi-trash'></a> 
                                </td>";
                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>


        <div class="row footer bg-footer mt-5">
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