<h1>Detalhes do jogo</h1>
<table class="detalhes">
    @@ if (!$busca): @@
        <tr><td> @ "Busca falhou!"; @
    @@ elseif (count($busca) === 1): @@
        @@ foreach ($busca as $reg): @@
            <tr>
                <td rowspan="3"><img src="@@ echo Utils::thumb($reg->capa); @@" class="full"/>
                <td> <h2>@ $reg->nome; @</h2>
                    @ number_format($reg->nota, 1); @/10
            <tr>
                <td> @ $reg->descricao; @
            <tr>
                <td> Adm
        @@ endforeach @@
    @@ else: @@
        <tr> <td> Nenhum registro encontrado.
    @@ endif @@
</table>
@@ voltar @@