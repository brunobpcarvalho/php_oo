<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudante</title>
</head>

<body>
    <?php
    require './Pessoa.php';
    require './Estudante.php';

    $estudante = new Estudante($_GET['pessoa_id']);
    $dados = $estudante->verEstudante();

    if (isset($_POST['editarEstudante'])) {
        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $status = $estudante->editarEstudante($formData);

        if ($status) {
            echo "Estudante editado com sucesso!";
            $dados = $estudante->verEstudante();
        } else {
            echo "Erro ao editar estudante!";
        }
    }

    ?>

    <h1>Edição de Estudante</h1>
    <form method="POST" action="" name="cadastro_estudante">
        <input type="hidden" name="pessoa_id" value="<?= $dados->pessoa_id ?>">
        <label for="nome">Nome</label><br>
        <input type="text" name="nome" id="nome" required value="<?= $dados->nome ?>"><br>
        <label for="telefone">Telefone</label><br>
        <input type="text" name="telefone" id="telefone" value="<?= $dados->telefone ?>"><br>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" value="<?= $dados->email ?>"><br>
        <label for="data_nascimento">Data de Nascimento</label><br>
        <input type="date" name="data_nascimento" id="data_nascimento" value="<?= $dados->data_nascimento ?>"><br>
        <label for="matricula">Matricula</label><br>
        <input type="text" name="matricula" id="matricula" value="<?= $dados->matricula ?>"><br>
        <label for="ira">IRA</label><br>
        <input type="text" name="ira" id="ira" value="<?= $dados->ira ?>"><br>
        <input type="submit" value="Editar" name="editarEstudante">
    </form>

    <a href="index.php"> Voltar </a>

</body>

</html>
