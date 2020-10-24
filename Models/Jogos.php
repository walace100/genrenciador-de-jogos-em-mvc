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

    public function joinTables(string $adicional = '', $bind = []): array
    {
        $sql = "SELECT j.cod, j.nome, g.genero, j.capa, p.produtora FROM jogos AS j
        INNER JOIN generos AS g ON j.genero = g.cod
        INNER JOIN produtoras AS p ON j.produtora = p.cod $adicional ";
        
        $statement = $this->querySt($sql, $bind);
        return $statement->fetchAll($this->fetch_style);
    }
}
