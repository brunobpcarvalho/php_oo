<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Professor</title>
</head>

<body>
    <?php
    require './Pessoa.php';
    require './Professor.php';

    $professor = new Professor($_GET['pessoa_id']);
    $dados = $professor->verProfessor();

    if (isset($_POST['editarProfessor'])) {
        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $status = $professor->editarProfessor($formData);

        if ($status) {
            echo "Professor editado com sucesso!";
            $dados = $professor->verProfessor();
        } else {
            echo "Erro ao editar professor!";
        }
    }

    ?>

    <h1>Edição de Professor</h1>
    <form method="POST" action="" name="cadastro_Professor">
        <input type="hidden" name="pessoa_id" value="<?= $dados->pessoa_id ?>">
        <label for="nome">Nome</label><br>
        <input type="text" name="nome" id="nome" required value="<?= $dados->nome ?>"><br>
        <label for="telefone">Telefone</label><br>
        <input type="text" name="telefone" id="telefone" value="<?= $dados->telefone ?>"><br>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" value="<?= $dados->email ?>"><br>
        <label for="data_nascimento">Data de Nascimento</label><br>
        <input type="date" name="data_nascimento" id="data_nascimento" value="<?= $dados->data_nascimento ?>"><br>
        <label for="especialidade">Especialidade</label><br>
        <input type="text" name="especialidade" id="especialidade" value="<?= $dados->especialidade ?>"><br>
        <label for="salario">Salario</label><br>
        <input type="text" name="salario" id="salario" value="<?= $dados->salario ?>"><br>
        <input type="submit" value="Editar" name="editarProfessor">
    </form>

    <a href="index.php"> Voltar </a>

</body>

</html>
