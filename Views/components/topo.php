<header>
    @@ $request = new Request(); @@
    @@ if (empty($request->session()->all()->user)): @@
        <a href="@ Route::string('/user/login'); @">Entrar</a>
    @@ else: @@
        Olá, <strong> @ $request->session()->all()->nome; @! </strong>|
        Meus Dados |
        @@ if(Auth::isAdmin()): @@
            <a href="@ Route::string('/user/novo'); @">Novo usuário</a> |
            Novo jogo |
        @@ endif @@ 
        <a href="@ Route::string('/user/logout'); @">Sair</a>
    @@ endif @@
</header>