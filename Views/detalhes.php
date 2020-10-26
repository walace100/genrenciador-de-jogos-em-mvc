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
                    @@ if (Auth::isAdmin()): @@
                        <i class="material-icons">add_circle</i>
                        <i class="material-icons">edit</i>
                        <i class="material-icons">delete</i>
                    @@ elseif (Auth::isEditor()): @@
                        <i class="material-icons">edit</i>
                    @@ endif @@
            <tr>
                <td> @ $reg->descricao; @
        @@ endforeach @@
    @@ else: @@
        <tr> <td> Nenhum registro encontrado.
    @@ endif @@
</table>
@@ voltar @@