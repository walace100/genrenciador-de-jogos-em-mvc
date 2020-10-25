<header>
    @@ session_start(); @@
    @@ if (empty($_SESSION['user'])): @@
    @@ var_dump($_SESSION); @@
        <a href="@ Route::string('/user/login') @">Entrar</a>
    @@ else: @@
        Olá <strong>, @ $_SESSION['nome']; @! </strong>| Sair
    @@ endif @@
</header>