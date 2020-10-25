<h1>Escolha seu jogo</h1>
<form method="GET" id="busca">
    Ordernar:
    <a href="?o=n&c=@ $chave; @">Nome</a> |
    <a href="?o=p&c=@ $chave; @">Produtora</a>  |
    <a href="?o=n1&c=@ $chave; @">Nota Alta</a> |
    <a href="?o=n2&c=@ $chave; @">Nota Baixa</a> |
    <a href="?o=n">Mostrar Todos</a> |
    Buscar <input type="text" name="c" size="10" maxlength="40" value=""/>
    <button type="submit">OK</button>
</form>
<table class="listagem">
    @@ if (!$busca): @@
        @ "<tr><td>infelizmente a busca deu errado."; @
    @@ elseif (count($busca) === 0): @@
        @ "<tr><td>Nenhum registro foi encontrado."; @
    @@ else: @@
        @@ foreach ($busca as $reg): @@
            <tr> 
                <td> <img src="@@ echo Utils::thumb($reg->capa); @@" class="mini"/>
                <td> <a href="@ Route::string('detalhes/' . $reg->cod); @">
                @ $reg->nome; @</a><br>
                (@ $reg->genero; @)
                @ $reg->produtora; @
                <td> Adm
        @@ endforeach; @@
    @@ endif @@
</table>