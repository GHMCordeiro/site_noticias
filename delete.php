<?php

    include_once("conexao.php");

    $id = $_GET['id'];

    $remove = "SELECT * FROM noticias WHERE id=$id";
    $remove_result = mysqli_query($conn, $remove);
    $user_data = mysqli_fetch_array($remove_result);
    $arquivo = $user_data['img'];
    unlink('img/'.$arquivo); 

    $sql = "DELETE FROM noticias WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    echo "<script>alert('Excluido com sucesso!');
    window.location.href = 'cadastros.php';</script>";

?>