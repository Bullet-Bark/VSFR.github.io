<?php
    $dns = "mysql:host=localhost;dbname=agenda-bd;charset=utf8";
    $user = "root";
    $pass = "";

    try {
        $conexao = new PDO($dns, $user, $pass);

    } catch (PDOException $erro) {
        echo("Entre em contatao com o suporte!");
    }
?>