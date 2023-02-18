<?php

include_once 'conexao.php';


if (!empty($_FILES['arquivo'])) {

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $noticia = $_POST['noticia'];
    $categoria = $_POST['categoria'];
    $data_noticia = $_POST['data_noticia'];

    $remove = "SELECT * FROM noticias WHERE id=$id";
    $remove_result = mysqli_query($conn, $remove);
    $user_data = mysqli_fetch_array($remove_result);
    $arquivo = $user_data['img'];

    $nome_arquivo = md5(time()) . ".png"; // Data e horário que o arquivo foi salvo e criptografado.

    $pasta = "img/";


    move_uploaded_file($_FILES["arquivo"]["tmp_name"], $pasta . $nome_arquivo); // Pegando o arquivo da pasta temporaria e enviando para a nova pasta.
    unlink('img/'.$arquivo);

    $sql = "UPDATE noticias SET titulo = '$titulo', noticia = '$noticia', data_noticia = '$data_noticia', categoria = '$categoria', img = '$nome_arquivo' WHERE id = '$id'";

    $resultado = $conn->query($sql);

    echo "<script>alert('Alterado com sucesso!');
    window.location.href = 'cadastros.php';</script>";
} 


else {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $noticia = $_POST['noticia'];
    $categoria = $_POST['categoria'];
    $data_noticia = $_POST['data_noticia'];

    $sql = "UPDATE noticias SET titulo = '$titulo', noticia = '$noticia', data_noticia = '$data_noticia', categoria = '$categoria' WHERE id = '$id'";

    $resultado = $conn->query($sql);

    echo "<script>alert('Alterado com sucesso!');
    window.location.href = 'cadastros.php';</script>";
}
