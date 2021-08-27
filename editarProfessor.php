<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Professor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
            echo "<script>toastr.success('Professor editado com sucesso!');</script>";
            $dados = $professor->verProfessor();
        } else {
            echo "<script>toastr.danger('Erro ao editar professor!');</script>";
        }
    }

    ?>

    <div class="container">
        <div class="card mt-5">
            <form method="POST" action="" name="cadastro_Professor" class="needs-validation" novalidate>
                <input type="hidden" name="pessoa_id" value="<?= $dados->pessoa_id ?>">
                <div class="card-header">Edição de Professor</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label" for="nome">Nome</label>
                            <input class="form-control" type="text" name="nome" id="nome" required value="<?= $dados->nome ?>">
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" required value="<?= $dados->email ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label class="form-label" for="salario">Salario</label>
                            <input class="form-control" type="text" name="salario" id="salario" required value="<?= $dados->salario ?>">
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="telefone">Telefone</label>
                            <input class="form-control" type="text" name="telefone" id="telefone" required value="<?= $dados->telefone ?>">
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="especialidade">Especialidade</label>
                            <input class="form-control" type="text" name="especialidade" id="especialidade" value="<?= $dados->especialidade ?>">
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="data_nascimento">Data de Nascimento</label>
                            <input class="form-control" type="date" name="data_nascimento" id="data_nascimento" required value="<?= $dados->data_nascimento ?>">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input class="btn btn-primary" type="submit" value="Editar" name="editarProfessor">
                    <a class="btn btn-secondary" href="index.php"> Voltar </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>