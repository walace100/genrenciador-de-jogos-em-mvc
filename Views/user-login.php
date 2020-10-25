<?php

use Controllers\Utils;
use Controllers\Auth;
use Lib\Http\Request;

$request = new Request();
if (!$busca) {
    echo Utils::msg_erro('Falha ao acessar o banco!');
} else {
    if (count($busca) > 0) {
        $reg = $busca[0];
        if (Auth::testarhash($s, $reg->senha)) {
            echo Utils::msg_sucesso('Logado com sucesso!');
            $request->session->user = $reg->usuario;
            $request->session->user = $reg->nome;
            $request->session->user = $reg->tipo;
        } else {
            echo Utils::msg_erro('Senha inválida');
        }
        echo Utils::msg_erro('Usuário não existe');
    }
}
?>
@@ voltar @@
