<header>
    @@ session_start(); @@
    @@ if (empty($_SESSION['user'])): @@
        <a href="@ Route::string('/user/login'); @">Entrar</a>
    @@ else: @@
        Olá <strong>, @ $_SESSION['nome']; @! </strong>|
        <a href="@ Route::string('/user/logout'); @">Sair</a>
    @@ endif @@
</header>