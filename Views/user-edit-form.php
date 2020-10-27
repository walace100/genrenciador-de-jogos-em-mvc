<h1>Alteração de Dados</h1>
<form method='POST'>
    <table>
        <tr>
            <td> Usuário
            <td> <input type="text" name="usuario" maxlength="10" size="10" value="@ $busca->usuario @" readonly>
        <tr>
            <td> Nome
            <td> <input type="text" name="nome" maxlength="30" size="30" value="@ $busca->nome @">
        <tr>
            <td> Tipo
            <td> <input type="text" name="tipo" readonly value="@ $busca->tipo @">
        <tr>
            <td> Senha
            <td> <input type="password" name="senha1" maxlength="10" size="10">
        <tr>
            <td> Confirme a senha
            <td> <input type="password" name="senha2" maxlength="10" size="10">
        <tr>
            <td> <button type="submit"> Salvar </button>
     </table>
</form>
@@ voltar @@
