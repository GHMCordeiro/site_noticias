<?php
    include('conexao.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM noticias WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $titulo = $user_data['titulo'];
            $noticia = $user_data['noticia'];
            $categoria = $user_data['categoria'];
            $data_noticia = $user_data['data_noticia'];
            $img = $user_data['img'];
        }
    }

    ?>


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
    <link rel="icon" href="img/logo.jpeg">
    <link rel="stylesheet" href="css/style.css">
    <title>Notícias</title>
</head>

<body>


    <div class="container-fluid">
        <div class="row mt-3 justify-content-center">
            <div class="col-md-6 col-sm-8 border p-3 rounded form_alterar">
                <form action="save_edit.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="titulo" placeholder="Título da notícia" class="form-control" value="<?php echo $titulo ?>">
                    <input type="text" name="noticia" placeholder="Digite a notícia" class="form-control mt-3" value="<?php echo $noticia ?>">
                    <input type="text" name="categoria" placeholder="Digite a categoria" class="form-control mt-3" value="<?php echo $categoria ?>">
                    <input type="date" name="data_noticia" class="form-control mt-3" value="<?php echo $data_noticia ?>">
                    <input type="file" name="arquivo" class="form-control mt-3" value="<?php echo $img ?>">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" value="Alterar" class="btn btn-primary mt-3 alterar">
                </form>
            </div>
        </div>

    </div>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>