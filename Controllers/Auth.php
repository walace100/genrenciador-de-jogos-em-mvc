<?php

namespace Controllers;

use Lib\Controllers\Controller;
use Lib\Http\Request;
use Models\Autenticacao;
use Lib\Http\CreateRoute as Route;

class Auth extends Controller
{
    private $users;

    private $request;

    public function __construct()
    {
        $this->users = new Autenticacao();
        $this->request = new Request();
        if (!isset($this->request->session()->all()->user)){
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
            $this->renderView('user-login-form', 'login', 'templete-login');
        } else {
            $busca = $this->users->find('usuario', $u, ['usuario', 'nome', 'senha', 'tipo']);
            $reg = $busca[0] ?? $busca;
            $this->renderView('user-login', 'login', 'templete-login', compact('busca'), compact('s'));
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

    private function renderView(string $view, string $title, $templete,?array ...$params) {
        $this->render($view, ...$params)
        ->templete('view', $templete)
        ->components(['titulo' => $title, 'rodape' => 'rodape', 'topo' => 'topo', 'voltar' => 'voltar']);
        if ($templete === 'templete-login') {
            $this->assets(['css' => 'estilo',  'css2' => 'estilo2']);
        } else {
            $this->assets(['css' => 'estilo']);
        }
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
        $this->renderView('user-logout', 'logout', 'templete-login');
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

    public function create(): void
    {
        $msg = [403, 'Área Restrita! Você não é administrador'];
        if (!self::isAdmin()) {
            $msg = true;
        } elseif (!isset($this->request->post()->usuario)) {
            $this->renderView('user-new-form', 'criar-usuario', 'templete-sem-topo');
        } else {
            $usuario = $this->request->has('usuario')->post()->usuario;
            $nome = $this->request->has('nome')->post()->nome;
            $senha1 = $this->request->has('senha1')->post()->senha1;
            $senha2 = $this->request->has('senha2')->post()->senha2;
            $tipo = $this->request->has('tipo')->post()->tipo;

            if ($senha1 === $senha2) {
                if (empty($usuario) || empty($nome) || empty($senha1) || empty($senha2) || empty($tipo)) {
                    $msg = [400, 'Todos os dados são obrigatórios!'];
                } else {
                    $senha = self::gerarHash($senha1);
                    if (count($this->users->find('usuario', $usuario)) > 0) {
                        $msg = [400, "Não foi possível criar o usuário <strong>$usuario.</strong> Talvez o login já esteja sendo usado."];
                    } else {
                        $resp = $this->users->insert(['usuario', 'nome', 'senha', 'tipo'], [$usuario, $nome, $senha, $tipo]);
                        $msg = [201, "Usuário <strong>$usuario.</strong>, cadastrado com sucesso!"];
                    }
                }
            } else {
                $msg = [400, 'Senhas não conferem. Repita o procedimento'];
            }

            $this->renderView('mensagem', 'criar-usuario', 'templete-sem-topo', compact('msg'));
        }
    }

    public function update(): void
    {
        if (!self::isLogado()) {
            $msg = [403, 'Efetue <a href="'. Route::string('user/login') .'">Login</a> para continuar.'];
            $this->renderView('mensagem', 'editar-usuario', 'templete-sem-topo', compact('msg'));
        } elseif (!isset($this->request->post()->usuario)) {
            $busca = $this->users->find('usuario', $this->request->session()->all()->user, ['usuario', 'nome', 'senha', 'tipo'])[0];
            $this->renderView('user-edit-form', 'editar-usuario', 'templete-sem-topo', compact('busca'));
        } else {
            echo 'aa';
        }
        
    }
}