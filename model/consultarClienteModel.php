<?php
class ConsultarClienteModel {
    //variavel para armazenar a conexao com o banco de dados
    private $conexao;

    //metodo construtor
    public function __construct() {
        //conexao com o banco de dados usando mysqli
        $this->conexao = new mysqli('localhost', 'root', '', 'basks');
        //verificacao de erros na conexao
        if ($this->conexao->connect_error) {
            die("Conexão falhou: " . $this->conexao->connect_error);
        }
    }

    public function consultarTodosClientes() {
        //variavel para armazenar a consulta em SQL.
        $sql = "SELECT * FROM clientes";
        //retorna o resultado da consulta
        return $this->conexao->query($sql);
    }

    public function consultarCliente($emailC) {
        //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $emailC = $this->conexao->real_escape_string($emailC);
        $sql = "SELECT * FROM clientes WHERE email = '$emailC'";
        //retorna o resultado da consulta
        return $this->conexao->query($sql);
    }
}
