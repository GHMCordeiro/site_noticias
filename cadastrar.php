<?php

    include_once 'conexao.php';

    $nome_arquivo = md5(time()) . ".png"; // Data e horário que o arquivo foi salvo e criptografado.

    $pasta = "img/";


    move_uploaded_file($_FILES["arquivo"]["tmp_name"], $pasta . $nome_arquivo); // Pegando o arquivo da pasta temporaria e enviando para a nova pasta.
    

    $titulo = $_POST['titulo'];
    $noticia = $_POST['noticia'];
    $categoria = $_POST['categoria'];
    $data_noticia = $_POST['data_noticia'];

    $sql = "INSERT INTO noticias (titulo, noticia, data_noticia, categoria, img) values
    ('$titulo', '$noticia', '$data_noticia', '$categoria', '$nome_arquivo')";

    $resultado = $conn->query($sql);

    echo "<script>alert('Cadastrado com sucesso!');
    window.location.href = 'cadastros.php';</script>";
?>
