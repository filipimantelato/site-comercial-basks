<!-- model/atualizarProdutoModel.php -->
<?php
class DeletarClienteModel {
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

    public function buscarEmail($email) {
        //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $email = $this->conexao->real_escape_string($email);
        //consulta SQL
        $sql = "SELECT * FROM clientes WHERE email = '$email'";
        //retorna o resultado da consultaSQL
        return $this->conexao->query($sql);
    }

    public function deletarEmail($email) {
        //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $email = $this->conexao->real_escape_string($email);
        // Verificar e atualizar as referências na tabela de compras
        $sql_update_compras = "UPDATE compras SET emailC = NULL WHERE emailC = '$email'";
        $this->conexao->query($sql_update_compras);
        //consulta SQL
        $sql = "DELETE FROM clientes WHERE email = '$email'";
        //retorna o resultado da consultaSQL
        return $this->conexao->query($sql);
    }
}
?>
