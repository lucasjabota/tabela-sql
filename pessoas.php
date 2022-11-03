<?php

class Pessoa {
    public $id_pessoa;
    public $nome;
    public $idade;
    public $data_registo;

    public function __construct($id_pessoa=false) {
        //construtor passando id como parametro
        //valor padrão de id é falso
        if($id_pessoa) { // caso seja passado um id ao construtor
        $this->id_pessoa = $id_pessoa;
        // associa o id recebido no parametro
        // ao id propriedade da classe
        $this->carregar();
        // e carrega o rstante das propriedades
        }
    }

    public function carregar() {
        $query = "SELECT nome, idade, data_registro FROM pessoas WHERE id_pessoa = :id_pessoa";
        $conexao = conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_pessoa', $this->id_pessoa);
        $stmt->execute();

        $lista = $stmt->fetch();
        // pega o retorno e coloca em uma lista fazendo o fetch (array chave e valor)
        // abaixo vincula cada valor recebido na lista com as propriedades da classe
        $this->nome = $lista['nome'];
        $this->idade = $lista['idade'];
        $this->data_registro = $lista['data_registro'];
    }

    public function inserir() { // inserir um registro
        $query = "INSERT INTO pessoas (nome, idade) VALUES (:nome, :idade)";
        // insere usando query preparada
        $conexao = Conexao::conectar();
        // cria a conexão
        $stmt = $conexao->prepare($query);
        $stmt->bindValue (':nome', $this->nome);
        $stmt->bindValue (':idade', $this->idade);
        // acima vinculam os valores da query com
        // as propriedades de classe
        $stmt->execute();
        // executa
    }

    public function listar() { // lista todos os registros da tabela
        $query = "SELECT * FROM pessoas";
        // seleciona todas as colunas da tabela
        $conexao = Conexao::conectar();
        // cria conexão 
        $resultado = $conexao->query($query);
        // executa a query e guarda o resultado na variável
        $lista = $resultado->fetchAll();
        // transforma o resultado em um array associativo
        //("chave":"valor")
        return $lista;
        //retorna a lista
    }

    public function atualizar() { // atualiza um registro
        $query = "UPDATE pessoas SET nome = :nome, idade = :idade WHERE id_pessoa = :id_pessoa";
        // atualiza o registro desejado através do id
        $conexao = Conexao::conectar();
        // cria conexão
        $stmt = $conexao->prepare($query);
        // prepara a query
        $stmt->bindValue(":nome", $this->nome);
        $stmt->bindValue(":idade", $this->idade);
        $stmt->bindValue(":id_pessoa", $this->id_pessoa);
        // vincula os valores
        $stmt->execute();
        // executa
    }

    public function deletar() { // exclui um registro
        $query = "DELETE FROM pessoas WHERE id_pessoa = :id_pessoa";
        // deleta pelo id
        $conexao = Conexao::conectar();
        //cria conexão
        $stmt = $conexao->prepare($query);
        // prepara a query
        $stmt->bindValue(":id_pessoa", $this->id_pessoa);
        // vincula o valor
        $stmt->execute();
        // executa
    }

    public function listarPorNome($palavra) { 
        // lista todos os registros da tabela
        $palavra = '%' . $palavra . '%'; // %palavra%
        $query = "SELECT * FROM pessoas WHERE nome LIKE :palavra";
        // seleciona todas as colunas da tabela
        $conexao = Conexao::conectar();
        // cria conexão 
        $stmt = $conexao->prepare($query);
        // executa a query e guarda o resultado na variável
        $stmt->bindValue(":palavra", $palavra);
        // vincula o placeholder de palavra com 
        // a variável palavra do método
        $stmt->execute();
        //executa
        $lista = $stmt->fetchAll();
        // transforma o resultado em um array associativo
        //("chave":"valor")
        return $lista;
        //retorna a lista
    }
}




//C reate - inserir
//R ead - carregar e listar
//U pdate - atualizar
//D elete - deletar











?>