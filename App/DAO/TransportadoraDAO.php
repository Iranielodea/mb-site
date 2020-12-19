<?php

namespace App\DAO;

require_once 'App/DAO/Crud.php';

use App\Models\TransportadoraModel;

class TransportadoraDAO extends Crud
{
    protected $tabela = "transportadora ";

    public function getAll($campo, $texto)
    {
        $texto = strtoupper($texto);
        $sql = "SELECT id, nome, cnpj, cpf_transp, email, fone1 FROM $this->tabela";
        $sql = $sql . " WHERE {$campo} LIKE '%{$texto}%'";
        $sql = $sql . " ORDER BY {$campo}";

        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function salvar(TransportadoraModel $model)
    {
        $sql = "";
        $id = $model->getId(); 

        if ($id == 0)
        {
            $sql = "INSERT INTO $this->tabela (
                bairro, 
                cep, 
                cnpj,
                codigo,
                cpf_transp,
                email,
                endereco,
                fax,
                fone1,
                fone2,
                insc_estadual,
                nome,
                nome_cidade,
                obs,
                ddd,
                contato,
                nome_banco,
                nome_titular,
                num_agencia,
                num_banco,
                num_conta,
                uf
            )
            VALUES (
                :bairro, 
                :cep, 
                :cnpj,
                :codigo,
                :cpfTransp,
                :email,
                :endereco,
                :fax,
                :fone1,
                :fone2,
                :inscEstadual,
                :nome,
                :nomeCidade,
                :obs,
                :ddd,
                :contato,
                :nomeBanco,
                :titular,
                :numAgencia,
                :numBanco,
                :numConta,
                :uf
            )";
        }
        else
        {
            $sql = "UPDATE " . $this->tabela." SET 
                bairro = :bairro, 
                cep = :cep, 
                cnpj = :cnpj,
                codigo = :codigo,
                cpf_transp = :cpfTransp,
                email = :email,
                endereco = :endereco,
                fax = :fax,
                fone1 = :fone1,
                fone2 = :fone2,
                insc_estadual = :inscEstadual,
                nome = :nome,
                nome_cidade = :nomeCidade,
                obs = :obs,
                ddd = :ddd,
                contato = :contato,
                nome_banco = :nomeBanco,
                nome_titular = :titular,
                num_agencia = :numAgencia,
                num_banco = :numBanco,
                num_conta = :numConta,
                uf = :uf
                WHERE id = :id
            ";
        }
        $bairro = $model->getBairro(); 
        $cep = $model->getCep(); 
        $cnpj = $model->getCnpj(); 
        $codigo = $model->getCodigo(); 
        $cpfTrans = $model->getCpfTransp();
        $email = $model->getEmail(); 
        $endereco = $model->getEndereco();
        $fax = $model->getFax(); 
        $fone1 = $model->getFone1(); 
        $fone2 = $model->getFone2(); 
        $inscEstadual = $model->getInscricaoEstadual(); 
        $nome = $model->getNome(); 
        $nomeCidade = $model->getNomeCidade(); 
        $obs = $model->getObs();
        $ddd= $model->getDDD(); 
        $contato = $model->getContato(); 
        $nomeBanco = $model->getNomeBanco(); 
        $titular = $model->getTitular();
        $numAgencia = $model->getNumAgencia(); 
        $numBanco = $model->getNumBanco(); 
        $numConta = $model->getNumConta(); 
        $uf = $model->getUf();

        $stmt = DB::prepare($sql);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':cnpj', $cnpj);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':cpfTransp', $cpfTrans);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':fax', $fax);
        $stmt->bindParam(':fone1', $fone1);
        $stmt->bindParam(':fone2', $fone2);
        $stmt->bindParam(':inscEstadual', $inscEstadual);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':nomeCidade', $nomeCidade);
        $stmt->bindParam(':obs', $obs);
        $stmt->bindParam(':ddd', $ddd);
        $stmt->bindParam(':contato', $contato);
        $stmt->bindParam(':nomeBanco', $nomeBanco);
        $stmt->bindParam(':titular', $titular);
        $stmt->bindParam(':numAgencia', $numAgencia);
        $stmt->bindParam(':numBanco', $numBanco);
        $stmt->bindParam(':numConta', $numConta);
        $stmt->bindParam(':uf', $uf);

        if ($id > 0)
        {
            $stmt->bindParam(':id', $id);            
        }
        
        return $stmt->execute();
    }
}