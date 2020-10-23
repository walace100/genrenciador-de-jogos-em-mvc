<?php

namespace Controllers;

use Lib\Http\CreateRoute as Route;

class Utils
{
    public static function thumb(string $arq): string
    {
        $caminho = Route::string('/Views/fotos/' . $arq);
        if (is_null($arq) || !file_exists($caminho)) {
            return $caminho;
        } else {
            return Route::string('/Views/fotos/indisponivel.png');
        }
    }
}
