<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Professor</title>
</head>

<body>
    <?php
    require './Pessoa.php';
    require './Professor.php';

    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($formData)) {
        $professor = new Professor(0);
        $cadastro = $professor->criarProfessor($formData);

        if ($cadastro) {
            echo "Professor cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastar Professor!";
        }
    }
    ?>

    <h1>Cadastro de Professor</h1>
    <form method="POST" action="" name="cadastro_professor">
        <label for="nome">Nome</label><br>
        <input type="text" name="nome" id="nome" required><br>
        <label for="telefone">Telefone</label><br>
        <input type="text" name="telefone" id="telefone"><br>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email"><br>
        <label for="data_nascimento">Data de Nascimento</label><br>
        <input type="date" name="data_nascimento" id="data_nascimento"><br>
        <label for="especialidade">Especialidade</label><br>
        <input type="text" name="especialidade" id="especialidade"><br>
        <label for="salario">Salário</label><br>
        <input type="text" name="salario" id="salario"><br>
        <button type="submit"> Cadastrar </button>
    </form>

    <a href="index.php"> Voltar </a>

</body>

</html>
