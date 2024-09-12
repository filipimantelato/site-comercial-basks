<!-- model/atualizarProdutoModel.php -->
<?php
class AtualizarProdutoModel {
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

    public function buscarProduto($codigoP) {
        //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $codigoP = $this->conexao->real_escape_string($codigoP);
        //consulta SQL
        $sql = "SELECT * FROM produtos WHERE codigo = '$codigoP'";
        //retorna o resultado da consultaSQL
        return $this->conexao->query($sql);
    }

    public function atualizarProduto($id, $nome, $codigo, $tamanho, $quantidade) {
        //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $id = $this->conexao->real_escape_string($id);
        $nome = $this->conexao->real_escape_string($nome);
        $codigo = $this->conexao->real_escape_string($codigo);
        $tamanho = $this->conexao->real_escape_string($tamanho);
        $quantidade = $this->conexao->real_escape_string($quantidade);
        //consulta SQL
        $sql = "UPDATE produtos SET nome='$nome', codigo='$codigo', tamanho='$tamanho', quantidade='$quantidade' WHERE id='$id'";
        //retorna o resultado da consultaSQL
        return $this->conexao->query($sql);
    }

    public function verificarCodigoExistente($codigo, $idAtual) {
        //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $codigo = $this->conexao->real_escape_string($codigo);
        $idAtual = $this->conexao->real_escape_string($idAtual);
        //consulta SQL
        $sql = "SELECT * FROM produtos WHERE codigo = '$codigo' AND id != '$idAtual'";
        //retorna o resultado da consultaSQL
        return $this->conexao->query($sql);
    }
}
?>
