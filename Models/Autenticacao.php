<?php

namespace Models;

use Lib\Models\Model;

class Autenticacao extends Model
{
    public function __construct()
    {
        $this->table = 'usuarios';
    }
}
