<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> POO PHP </title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            padding: 2px;
        }
    </style>
</head>

<body>
    <?php
    require_once './Conexao.php';
    require './Pessoa.php';
    require './Estudante.php';
    require './Professor.php';

    $conexao = new Conexao();
    $professores = $conexao->listarProfessores();
    $estudantes = $conexao->listarEstudantes();
    ?>

    <h2>Professores</h2>
    <a href="CadastroProfessor.php">Cadastrar</a>
    <br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Especialidade</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($professores as $p) {
                echo "<tr>
                        <td>{$p['pessoa_id']}</td>
                        <td>{$p['nome']}</td>
                        <td>{$p['telefone']}</td>
                        <td>{$p['email']}</td>
                        <td>{$p['especialidade']}</td>
                        <td><a href='editarProfessor.php?pessoa_id={$p['pessoa_id']}'>Editar</a></td>
                    </tr>";
            }
            ?>

        </tbody>
    </table>

    <br>
    <hr>

    <h2>Estudantes</h2>
    <a href="CadastroEstudante.php">Cadastrar</a>
    <br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Matricula</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($estudantes as $e) {
                echo "<tr>
                        <td>{$e['pessoa_id']}</td>
                        <td>{$e['nome']}</td>
                        <td>{$e['telefone']}</td>
                        <td>{$e['email']}</td>
                        <td>{$e['matricula']}</td>
                        <td><a href='editarEstudante.php?pessoa_id={$e['pessoa_id']}'>Editar</a></td>
                    </tr>";
            }
            ?>

        </tbody>
    </table>

</body>

</html>
