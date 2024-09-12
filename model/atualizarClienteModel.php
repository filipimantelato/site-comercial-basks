<!-- model/atualizarProdutoModel.php -->
<?php
class AtualizarClienteModel {
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

    public function buscarCliente($email) {
        //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $email = $this->conexao->real_escape_string($email);
        //consulta SQL
        $sql = "SELECT * FROM clientes WHERE email = '$email'";
        //retorna o resultado da consultaSQL
        return $this->conexao->query($sql);
    }

    public function atualizarCliente($id, $nome, $email, $cpf, $cep) {
        //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $id = $this->conexao->real_escape_string($id);
        $nome = $this->conexao->real_escape_string($nome);
        $email = $this->conexao->real_escape_string($email);
        $cpf = $this->conexao->real_escape_string($cpf);
        $cep = $this->conexao->real_escape_string($cep);
        //consulta SQL
        $sql = "UPDATE clientes SET nome='$nome', email='$email', cpf='$cpf', cep='$cep' WHERE id='$id'";
        //retorna o resultado da consultaSQL
        return $this->conexao->query($sql);
    }

    public function verificarClienteExistente($email, $idAtual) {
        //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $email = $this->conexao->real_escape_string($email);
        $idAtual = $this->conexao->real_escape_string($idAtual);
        //consulta SQL
        $sql = "SELECT * FROM clientes WHERE email = '$email' AND id != '$idAtual'";
        //retorna o resultado da consultaSQL
        return $this->conexao->query($sql);
    }

    public function verificarClienteExistenteC($cpf, $idAtual) {
        //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $cpf = $this->conexao->real_escape_string($cpf);
        $idAtual = $this->conexao->real_escape_string($idAtual);
        //consulta SQL
        $sql = "SELECT * FROM clientes WHERE cpf = '$cpf' AND id != '$idAtual'";
        //retorna o resultado da consultaSQL
        return $this->conexao->query($sql);
    }
}
?>
