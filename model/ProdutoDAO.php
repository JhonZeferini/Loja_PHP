<?php
namespace model;
require "conexao.php";

use Conexao;
class ProdutoDAO
{

    public function salvar($produto)
    {
        try {
            //Recupera conexão
            $conexao = new Conexao();
            //Recebe a conexao com o banco
            $connection = $conexao->getConnection();
            //Statement 'Consulta'
            $stmt = $connection->prepare(
                'INSERT INTO produto(nome, categoria, preco)
            VALUES(:nome, :categoria, :preco) '
            );
            //Preencher a consulta
            $stmt->bindParam(':nome', $produto->getNome());
            $stmt->bindParam(':categoria', $produto->getCategoria());
            $stmt->bindColumn('preco', $produto->getNome());
            //Executa a consulta
            $stmt->execute();
            return 'Produto cadastrado com sucesso';
        } catch (\PDOException $erro) {
            return $erro->getMessage();
        }
    }
    public function atualizar($produto)
    {
        $conexao = new Conexao();
        $connection = $conexao->getConnection();
        $stmt = $connection->prepare('UPDATE produto set nome = :nome, categoria = :categoria,
         preco = :preco, categoria = :categoria, preco = :preco, where codigo = :codigo ');
        $stmt->bindParam(':nome', $produto->getNome());
        $stmt->bindParam(':codigo', $produto->getCodigo());
        $stmt->execute();
        return 'Atualizado com sucesso';

    }
    public function getTodos()
    {
        //1- istancia
        $conexao = new Conexao();
        //2- recupera
        $conection = $conexao->getConnection();
        //3- sql
        $SQL = 'Select * from produtos';
        //4- realiza a consulta
        $resultado = $conection->query($SQL);
        $produtos = []; //inicializa a resposta
        while ($linha = $resultado->fetch()) {
            $produto = new Produto();
            $produto->setCodigo($linha['codigo']);
            $produto->setNome($linha['nome']);
            $produto->setCategoria($linha['categoria']);
            $produto->setPreco($linha['preco']);
            array_push($produtos, $produto);
        }
        return $produtos;
    }
    public function getPorCodigo($codigo)
    {
        try {
            $conexao = new Conexao();
            $connection = $conexao->getConnection();
            $SQL = "SELECT * FROM produtos WHERE codigo = :codigo";
            $stmt = $connection->prepare($SQL);
            $stmt->bindParam(':codigo', $codigo);
            $stmt->execute();
            $resultado = $stmt->fetch();
            return $resultado;
        } catch (PDOException $error) {
            return $error->getMessage();
        }
    }


}

?>