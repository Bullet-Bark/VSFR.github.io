<?php
    echo "<pre>";
        print_r($_POST);
    echo "</pre>";
    exit();

    $nome = filter_input(INPUT_POST, "nome",FILTER_SANTIZE_SPECIAL_CHARS);
    $senha = filter_input(INPUT_POST, "senha",FILTER_SANTIZE_SPECIAL_CHARS);

    try {
        require_once("./conexao/conexao.php");

        $comandoSQL = "INSERT INTO usuario
                        (nome_User,
                        senha_User)
                    VALUES
                        (:nome,
                        :senha)";

        $comando = $conexao->prepare($comandoSQL);

        $comando->execute(array(
            ":nome"  => $nome,
            ":senha" => password_hash($senha, PASSWORD_DEFAULT)
        ));

        if($comando->rowCount() > 0){
            echo "Cadastro realizado com sucesso";
        }else{
            echo "Cadastro não realizado"
        }

     } catch(PDOException $erro) {
        echo "Entre em contato com o suporte"
     }
?>