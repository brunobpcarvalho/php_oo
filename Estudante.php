<?php

class Estudante extends Pessoa
{
    public $matricula;
    public $ira;

    public function verEstudante(): object
    {
        $conn =  new Conexao();
        $connectar = $conn->connect();

        $sql = "SELECT *
                    FROM php_oo.estudante e
                    LEFT JOIN  php_oo.pessoa p
                    ON e.pessoa_id = p.ID
                    WHERE pessoa_id =:pessoa_id";

        $result = $connectar->prepare($sql);
        $result->execute(array(':pessoa_id' => $this->id));

        return $result->fetchObject();
    }
    public function calculaAvaliacao()
    {
        $ira = 50;
        $porcentagemPresenca = 80;
        $resultdato = $ira * $porcentagemPresenca;
        return $resultdato;
    }

    public function criarEstudante(array $estudante): bool
    {
        $conn =  new Conexao();
        $connectar = $conn->connect();

        $sql = "INSERT INTO pessoa (nome, telefone, email, data_nascimento)
                VALUES (:nome, :telefone, :email, :data_nascimento)";

        $result = $connectar->prepare($sql);
        $result->execute(array(
            ':nome' => $estudante['nome'],
            ':telefone' => $estudante['telefone'],
            ':email' => $estudante['email'],
            ':data_nascimento' => $estudante['data_nascimento']
        ));

        $pessoa_id = $connectar->lastInsertId();

        if ($pessoa_id) {
            $sql = "INSERT INTO estudante (pessoa_id, matricula)
                VALUES (?, ?)";

            $result = $connectar->prepare($sql);
            $result->execute(array(
                $pessoa_id,
                $estudante['matricula']
            ));

            if ($result->rowCount()) {
                return true;
            }
        }
        return false;
    }

    public function editarEstudante(array $estudante): bool
    {
        $conn =  new Conexao();
        $connectar = $conn->connect();

        $sql = "UPDATE pessoa SET nome=:nome, telefone=:telefone, email=:email, data_nascimento=:data_nascimento
                WHERE ID=:pessoa_id ";

        $result = $connectar->prepare($sql);
        $status = $result->execute(array(
            ':nome' => $estudante['nome'],
            ':telefone' => $estudante['telefone'],
            ':email' => $estudante['email'],
            ':data_nascimento' => $estudante['data_nascimento'],
            ':pessoa_id' => $estudante['pessoa_id'],

        ));

        if ($status) {
            $sql = "UPDATE estudante SET matricula=:matricula, ira=:ira
            WHERE pessoa_id=:pessoa_id ";

            $result = $connectar->prepare($sql);
            $status = $result->execute(array(
                ':matricula' => $estudante['matricula'],
                ':ira' => $estudante['ira'],
                ':pessoa_id' => $estudante['pessoa_id'],

            ));

            if ($status) {
                return true;
            }
        }
        return false;
    }
}
