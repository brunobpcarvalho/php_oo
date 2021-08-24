<?php

class Professor extends Pessoa
{
    public string $especialidade;
    public float $salario;

    public function verProfessor(): object
    {
        $conn =  new Conexao();
        $connectar = $conn->connect();

        $sql = "SELECT *
                    FROM php_oo.professor o
                    LEFT JOIN  php_oo.pessoa p
                    ON o.pessoa_id = p.ID
                    WHERE pessoa_id =:pessoa_id";

        $result = $connectar->prepare($sql);
        $result->execute(array(':pessoa_id' => $this->id));

        return $result->fetchObject();
    }

    public function calculaAvaliacao()
    {
        $qtdDisciplinasMinistradas = 100;
        $qtdAnosInstituicao = 12;
        $resultdato = $qtdDisciplinasMinistradas * $qtdAnosInstituicao;
        return $resultdato;
    }

    public function criarProfessor(array $professor): bool
    {
        $conn =  new Conexao();
        $connectar = $conn->connect();

        $sql = "INSERT INTO pessoa (nome, telefone, email, data_nascimento)
                VALUES (:nome, :telefone, :email, :data_nascimento)";

        $result = $connectar->prepare($sql);
        $result->execute(array(
            ':nome' => $professor['nome'],
            ':telefone' => $professor['telefone'],
            ':email' => $professor['email'],
            ':data_nascimento' => $professor['data_nascimento']
        ));

        $pessoa_id = $connectar->lastInsertId();

        if ($pessoa_id) {
            $sql = "INSERT INTO professor (pessoa_id, especialidade, salario)
                VALUES (?, ?, ?)";

            $result = $connectar->prepare($sql);
            $result->execute(array(
                $pessoa_id,
                $professor['especialidade'],
                $professor['salario']
            ));

            if ($result->rowCount()) {
                return true;
            }
        }
        return false;
    }

    public function editarProfessor(array $professor): bool
    {
        $conn =  new Conexao();
        $connectar = $conn->connect();

        $sql = "UPDATE pessoa SET nome=:nome, telefone=:telefone, email=:email, data_nascimento=:data_nascimento
                WHERE ID=:pessoa_id ";

        $result = $connectar->prepare($sql);
        $status = $result->execute(array(
            ':nome' => $professor['nome'],
            ':telefone' => $professor['telefone'],
            ':email' => $professor['email'],
            ':data_nascimento' => $professor['data_nascimento'],
            ':pessoa_id' => $professor['pessoa_id'],

        ));

        if ($status) {
            $sql = "UPDATE professor SET especialidade=:especialidade, salario=:salario
            WHERE pessoa_id=:pessoa_id ";

            $result = $connectar->prepare($sql);
            $status = $result->execute(array(
                ':especialidade' => $professor['especialidade'],
                ':salario' => $professor['salario'],
                ':pessoa_id' => $professor['pessoa_id'],

            ));

            if ($status) {
                return true;
            }
        }
        return false;
    }
}
