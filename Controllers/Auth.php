<?php

namespace Controllers;

use Lib\Controllers\Controller;
use Lib\Http\Request;
use Models\Autenticacao;

class Auth extends Controller
{
    private $users;

    private $request;

    public function __construct()
    {
        $this->users = new Autenticacao();
        $this->request = new Request();
        if (!isset($this->request->session()->user)){
            $this->request->session()->user = "";
            $this->request->session()->nome = "";
            $this->request->session()->tipo = "";
        }
    }

    public function index(): void
    {
        $u = $this->request->post()->usuario ?? null;
        $s = $this->request->post()->senha ?? null;

        if (is_null($u) || is_null($s)) {
            $this->renderView('user-login-form', 'login');
        } else {
            $busca = $this->users->find('usuario', $u, ['usuario', 'nome', 'senha', 'tipo']);
            $reg = $busca[0] ?? $busca;
            $this->renderView('user-login', 'login', compact('busca'), compact('s'));
        }
    }

    public static function gerarHash(string $senha): string
    {
        $txt = self::cripto($senha);
        return password_hash($txt, PASSWORD_DEFAULT);
    }

    public static function testarhash(string $senha, string $hash): bool
    {
        return password_verify(self::cripto($senha), $hash);
    }

    public static function cripto(string $senha): string
    {
        $c = '';
        for ($pos = 0; $pos < strlen($senha); $pos++) {
            $letra = ord($senha[$pos]) + 1;
            $c .= chr($letra);
        }
        return $c;
    }

    private function renderView(string $view, string $title, ?array ...$params) {
        $this->render($view, ...$params)
        ->templete('view', 'templete-login')
        ->assets(['css' => 'estilo'])
        ->components(['titulo' => $title, 'rodape' => 'rodape', 'topo' => 'topo', 'voltar' => 'voltar']);
    }

    public static function logout(): void
    {
        $request = new Request();
        $request->session()->delete('user');
        $request->session()->delete('nome');
        $request->session()->delete('tipo');
    }

    public function sair(): void
    {
        $this->renderView('user-logout', 'login');
    }

    public static function isLogado(): bool
    {
        $request = new Request();
        if (empty($request->session()->all()->user)) {
            return false;
        } else {
            return true;
        }
    }

    public static function isAdmin(): bool
    {
        $request = new Request();
        $tipo = $request->session()->all()->tipo ?? null;

        if (is_null($tipo)) {
            return false;
        } elseif ($tipo === 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public static function isEditor(): bool
    {
        $request = new Request();
        $tipo = $request->session()->all()->tipo ?? null;

        if (is_null($tipo)) {
            return false;
        } elseif ($tipo === 'editor') {
            return true;
        } else {
            return false;
        }
    }
}