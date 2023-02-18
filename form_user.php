<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Viga|Outfit|Rokkitt|Oswald|Lexend|">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/logo.png">
    <title>Document</title>
</head>

<body class="background">

    <div class="container titulo">
        <div class="row text-center">
            <form action="cad_usuario.php" method="POST">
                <div class="col-md-4 col-sm-4 p-3 form_user change" >
                    <h2>Cadastro</h2>
                    <input type="text" name="nome" placeholder="Digite seu nome" class="form-control mt-3 " required>
                    <input type="text" name="usuario" placeholder="Digite seu usuario" class="form-control mt-3" required>
                    <input type="text" name="senha" placeholder="Digite sua senha" class="form-control mt-3 " required>
                    <input type="submit" class="btn cat mt-3" value="Cadastrar">
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>