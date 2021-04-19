<?php

namespace App\DAO;

require_once 'App/DAO/Crud.php';

use App\Models\ClienteModel;

class ClienteDAO extends Crud
{
    protected $tabela = "cliente ";

    public function getAll($campo, $texto)
    {
        $texto = strtoupper($texto);
        $sql = "SELECT id, codigo, nome, cnpj, insc_estadual, cpf, fone, email FROM $this->tabela";
        //$sql = "SELECT * FROM $this->tabela";
        $sql = $sql . " WHERE {$campo} LIKE '%{$texto}%'";
        $sql = $sql . " ORDER BY {$campo}";

        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function salvar(ClienteModel $model)
    {
        $sql = "";
        $id = $model->getId();

        //var_dump($model);

        if ($id == 0)
        {
            $sql = "INSERT INTO $this->tabela (
                    bairro, 
                    cep, 
                    cnpj,
                    codigo,
                    complemento,
                    cpf,
                    data_cadastro,
                    email,
                    endereco,
                    fantasia,
                    fax,
                    fone,
                    insc_estadual,
                    nome,
                    nome_cidade,
                    numero,
                    obs,
                    rg,
                    tipo_pessoa,
                    uf
                ) 
                VALUES (
                    :bairro, 
                    :cep, 
                    :cnpj,
                    :codigo,
                    :complemento,
                    :cpf,
                    :data_cadastro,
                    :email,
                    :endereco,
                    :fantasia,
                    :fax,
                    :fone,
                    :insc_estadual,
                    :nome,
                    :nome_cidade,
                    :numero,
                    :obs,
                    :rg,
                    :tipo_pessoa,
                    :uf)";
        }
        else {
            $sql = "UPDATE " . $this->tabela." SET 
                        bairro = :bairro, 
                        cep  = :cep, 
                        cnpj  = :cnpj,
                        codigo  = :codigo,
                        complemento  = :complemento,
                        cpf  = :cpf,
                        data_cadastro = :data_cadastro,
                        email = :email,
                        endereco = :endereco,
                        fantasia = :fantasia,
                        fax = :fax,
                        fone = :fone,
                        insc_estadual = :insc_estadual,
                        nome = :nome,
                        nome_cidade = :nome_cidade,
                        numero = :numero,
                        obs = :obs,
                        rg = :rg,
                        uf = :uf
                        tipo_pessoa = :tipo_pessoa
                    WHERE id = :id
            ";
        }

        $bairro = $model->getBairro();
        $cep = $model->getCep();
        $cnpj = $model->getCnpj();
        $codigo = $model->getCodigo();
        $complemento = $model->getComplemento();
        $cpf = $model->getCpf();
        $dataCadastro = $model->getDataCadastro();
        $email = $model->getEmail();
        $endereco = $model->getEndereco();
        $fantasia = $model->getFantasia();
        $fax = $model->getFax();
        $fone = $model->getFone();
        $inscEstadual = $model->getInscricaoEstadual();
        $nome = $model->getNome();
        $nomeCidade = $model->getNomeCidade();
        $numero = $model->getNumero();
        $obs = $model->getObs();
        $rg = $model->getRg();
        $tipoPessoa = $model->getTipoPessoa();
        $uf = $model->getUf();

        $stmt = DB::prepare($sql);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':cnpj', $cnpj);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':data_cadastro', $dataCadastro);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':fantasia', $fantasia);
        $stmt->bindParam(':fax', $fax);
        $stmt->bindParam(':fone', $fone);
        $stmt->bindParam(':insc_estadual', $inscEstadual);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':nome_cidade', $nomeCidade);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':obs', $obs);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':tipo_pessoa', $tipoPessoa);
        $stmt->bindParam(':uf', $uf);

        if ($id > 0)
            $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }
}