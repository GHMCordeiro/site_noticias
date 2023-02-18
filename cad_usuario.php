<?php

    include_once ("conexao.php");

    if(!empty($_POST['nome']) && !empty($_POST['usuario']) && !empty($_POST['senha']))
    {
        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $sql = "INSERT INTO usuarios (nome, usuario, senha) values ('$nome', '$usuario', '$senha')";
        $result = mysqli_query($conn, $sql);

        echo "<script>alert('Usuario cadastrado com sucesso!');
        window.location.href = 'index.php';</script>";
    }


?>