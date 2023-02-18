<?php

include('conexao.php');
session_start();

if (!empty($_POST['usuario']) && !empty($_POST['senha'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' and senha = '$senha' ";
    $resultado = $conn->query($sql);

        if(mysqli_num_rows($resultado) == 1)
        {
            $_SESSION['usuario'] = $usuario;
            header('Location: tela_logado.php');

        }
        else
        {
            echo "
            <script>
                alert('Usuário e/ou Senha incorreto(s)');
                window.location.href = 'index.php';
            </script>";
        }
} 

else {
    echo "
    <script>
        alert('Digite todos os campos!');
        window.location.href = 'index.php';
    </script>";
}
