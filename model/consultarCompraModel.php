<?php
class ConsultarComprasModel {
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

    public function consultarTodasCompras() {
        //variavel para armazenar a consulta em SQL.
        $sql = "SELECT * FROM compras";
        $result = $this->conexao->query($sql);
        //retorna o resultado da consulta
        return $result;
    }

    public function consultarComprasEmail($email) {
        //escapa de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $email = $this->conexao->real_escape_string($email);
        //variavel para armazenar a consulta em sql
        $sql = "SELECT * FROM compras WHERE emailC = '$email'";
        //execucao da consulta SQL
        $result = $this->conexao->query($sql);
        //array para armazenar as compras
        $compras = array();
        //loop para armazenar os resultados em um array
        while ($row = $result->fetch_assoc()) {
            $compras[] = $row;
        }
        //retorna o array compras;
        return $compras;
    }

    public function consultarComprasData($data) {
        //escapa de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $data = $this->conexao->real_escape_string($data);
        //variavel para armazenar a consulta em sql
        $sql = "SELECT * FROM compras WHERE dataCompra = '$data'";
        //execucao da consulta SQL
        $result = $this->conexao->query($sql);
        //loop para armazenar os resultados em um array
        while($row = $result->fetch_assoc()){
            $compras[] = $row;
        }
        //retorna o array compras;
        return $compras;
    }

    public function consultarComprasEmailData($email, $data) {
        //escapa de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $email = $this->conexao->real_escape_string($email);
        $data = $this->conexao->real_escape_string($data);
        //variavel para armazenar a consulta em sql
        $sql = "SELECT * FROM compras WHERE emailC = '$email' AND dataCompra = '$data'";
        //execucao da consulta SQL
        $result = $this->conexao->query($sql);
        //loop para armazenar os resultados em um array
        while($row = $result->fetch_assoc()){
            $compras[] = $row;
        }
        //retorna o array compras;
        return $compras;
    }
}
