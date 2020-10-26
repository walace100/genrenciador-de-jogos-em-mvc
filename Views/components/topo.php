<header>
    @@ use Lib\Http\Request; @@

    @@ $request = new Request(); @@
    @@ if (empty($request->session()->all()->user)): @@
        <a href="@ Route::string('/user/login'); @">Entrar</a>
    @@ else: @@
        Olá, <strong> @ $request->session()->all()->nome; @! </strong>|
        Meus Dados |
        @@ if(Auth::isAdmin()): @@
            Novo usuário | 
            Novo jogo |
        @@ endif @@ 
        <a href="@ Route::string('/user/logout'); @">Sair</a>
    @@ endif @@
</header>