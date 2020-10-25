<h1>Login</h1>
<form action="@ Route::string('/user/login'); @" method="POST">
    <table>
        <tr>
            <td> Usuário
            <td> <input type="text" name="usuario" size="10" maxlength="10">
        <tr>
            <td> Senha
            <td> <input type="password" name="senha" size="8" maxlength="8">
        <tr>
            <td> <button type="submit">Entrar</button>
    </table>
</form>