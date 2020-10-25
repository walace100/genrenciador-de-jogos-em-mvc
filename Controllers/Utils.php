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

    public static function msg_sucesso(string $m): string
    {
        return "<div class='sucesso'><i class='material-icons'>check_circle</i>$m</div>";
    }

    public static function msg_aviso(string $m): string
    {
        return "<div class='aviso'><i class='material-icons'>info</i>$m</div>";
    }

    public static function msg_erro(string $m): string
    {
        return "<div class='erro'><i class='material-icons'>error</i>$m</div>";
    }
}
