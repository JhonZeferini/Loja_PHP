<?php
namespace model;

use Conexao;
class ProdutoDAO
{

    public function salvar($produto)
    {
        try{
        //Recupera conexão
        $conexao = new Conexao();
        //Recebe a conexao com o banco
        $connection = $conexao->getConnection();
        //Statement 'Consulta'
        $stmt = $connection->prepare(
            'INSERT INTO produto(nome, categoria, valor)
            VALUES(:nome, :categoria, :valor) '
        );
        //Preencher a consulta
        $stmt->bindParam(':nome', $produto->getNome());
        $stmt->bindParam(':categoria', $produto->getCategoria);
        //Executa a consulta
        $stmt->execute();
        return 'Produto cadastrado com sucesso';
    }catch(\PDOException $erro){
        return $erro->getMessage();
    }
    }
    public function atualizar($produto)
    {
        $conexao = new Conexao();
        $connection = $conexao->getConnection();
        $stmt = $connection->prepare('UPDATE produto set nome = :nome, categoria = :categoria,
         valor = :valor, categoria = :categoria, valor = :valor, where codigo = :codigo ');
        $stmt->bindParam(':nome', $produto->getNome());
        $stmt->bindParam(':codigo', $produto->getCodigo());
        $stmt->execute();
        return 'Atualizado com sucesso';

    }

}

?>