<?php

namespace App\Models;
require_once "App/Models/BaseModel.php";
require_once "App/Models/PessoaBase.php";

class FornecedorModel extends PessoaBase
{
    private $fone;

    public function getFone()
    {
        return $this->fone;
    }

    public function setFone($fone)
    {
        $this->fone = $fone;
    }
}