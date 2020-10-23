<?php

namespace Models;

use Lib\Models\Model;

class Jogos extends Model
{
    public function __construct()
    {
        $this->table = 'jogos';
    }

    public function allOrderBy(): array
    {
        $sql = "SELECT * FROM jogos ORDER BY nome";
        $statement = $this->querySt($sql);
        return $statement->fetchAll($this->fetch_style);
    }
}
