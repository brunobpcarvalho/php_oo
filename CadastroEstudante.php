<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Estudante</title>
</head>

<body>
    <?php
    require './Pessoa.php';
    require './Estudante.php';

    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($formData)) {
        $estudante = new Estudante(0);
        $cadastro = $estudante->criarEstudante($formData);

        if ($cadastro) {
            echo "Estudante cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastar Estudante!";
        }
    }
    ?>

    <h1>Cadastro de Estudante</h1>
    <form method="POST" action="" name="cadastro_estudante">
        <label for="nome">Nome</label><br>
        <input type="text" name="nome" id="nome" required><br>
        <label for="telefone">Telefone</label><br>
        <input type="text" name="telefone" id="telefone"><br>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email"><br>
        <label for="data_nascimento">Data de Nascimento</label><br>
        <input type="date" name="data_nascimento" id="data_nascimento"><br>
        <label for="matricula">Matricula</label><br>
        <input type="text" name="matricula" id="matricula"><br>
        <label for="ira">IRA</label><br>
        <input type="text" name="ira" id="ira"><br>
        <button type="submit"> Cadastrar </button>
    </form>

    <a href="index.php"> Voltar </a>

</body>

</html>
