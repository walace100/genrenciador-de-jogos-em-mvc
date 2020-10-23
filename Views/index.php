<h1>Escolha seu jogo</h1>
<table class="listagem">
    @@ if (!$busca): @@
        @ "<tr><td>infelizmente a busca deu errado."; @
    @@ elseif (count($busca) === 0): @@
        @ "<tr><td>Nenhum registro foi encontrado."; @
    @@ else: @@
        @@ foreach ($busca as $reg): @@
            <tr> 
                <td> <img src="@@ echo Utils::thumb($reg->capa); @@" class="mini"/>
                <td> <a href='detalhes/<?= $reg->cod; ?>'>@ $reg->nome; @</a>
                <td> Adm
        @@ endforeach; @@
    @@ endif @@
</table>