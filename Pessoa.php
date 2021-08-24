<?php

require_once './Conexao.php';

abstract class  Pessoa
{
    public int $id;
    public string $nome;
    public string $telefone;
    public string $email;
    public string $dataNascimento;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function verDados(): object
    {
        $conn = new Conexao();
        $conectar = $conn->connect();

        $sql = "SELECT nome, telefone, email FROM php_oo.pessoa WHERE id = :id";

        $result = $conectar->prepare($sql);
        $result->execute(array(':id' => $this->id));

        return $result->fetchObject();
    }

    public function calculaIdade($dataNascimento): int
    {
        $date  = new DateTime($dataNascimento);
        $interval = $date->diff(new DateTime(date('Y-m-d')));

        return $interval->format('%Y');
    }

    abstract function calculaAvaliacao();
}
