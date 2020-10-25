<?php

use Lib\Http\CreateRoute as Route;

/**
 * Aqui você pode registrar as suas rotas para seus Controllers ou Callbacks.
 */

Route::get("/", "HomeController", "index");

Route::get("/detalhes/{id}", "HomeController", "show");

Route::any("/user/login", "Auth", "index");
