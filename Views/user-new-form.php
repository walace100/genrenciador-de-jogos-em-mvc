<h1>Novo Usuário</h1>
<form action="@@ Route::string('/user/novo'); @@" method="POST">
    <table>
        <tr>
            <td> Usuário
            <td> <input type="text" name="usuario" size="10" maxlength="10">
        <tr>
            <td> Nome
            <td> <input type="text" name="nome" size="30" maxlength="30">
        <tr>
            <td> Tipo
            <td><select name="tipo">
                    <option value="admin">Administrador do Sistema</option>
                    <option value="editor" selected>Editor Autorizado</option>
                </select>
        <tr>
            <td> Senha
            <td> <input type="password" name="senha1" size="10" maxlength="10">
        <tr>
            <td> Confirme a senha
            <td> <input type="password" name="senha2" size="10" maxlength="10">
        <tr> <td> <button type="submit">Salvar</button>
    </table>
</form>