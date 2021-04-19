<?php
namespace App\Models;

class Funcoes
{
    public static function formatarData($data)
    {
        if ($data == null)
            return "";

        return date('d/m/Y', strtotime($data));
    }

    public static function formatarValor($valor, $casas)
    {
        return number_format($valor, $casas,",", ".");
    }
}