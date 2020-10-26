<?php

$request = new Request();
if (!$busca) {
    echo Utils::msg_erro('Falha ao acessar o banco!');
} else {
    if (count($busca) > 0) {
        $reg = $busca[0];
        if (Auth::testarhash($s, $reg->senha)) {
            echo Utils::msg_sucesso('Logado com sucesso!');
            $request->session()->user = $reg->usuario;
            $request->session()->nome = $reg->nome;
            $request->session()->tipo = $reg->tipo;
        } else {
            echo Utils::msg_erro('Senha inválida');
        }
    } else {
        echo Utils::msg_erro('Usuário não existe');
    }
}
?>
@@ voltar @@
