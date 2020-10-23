<?php

namespace Controllers;

use Lib\Controllers\Controller;
use Lib\Http\Request;
use \Models\Jogos;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->jogos = new Jogos();
    }
    /**
     * Método inicial.
     */
    public function index()
    {
        $busca = $this->jogos->allOrderBy();
        $this->renderView('index', compact('busca'));
    }

    private function renderView(string $view, array $params = []) {
        $this->render($view, $params)
        ->templete('view', 'templete')
        ->assets(['css' => 'estilo'])
        ->components(['titulo' => 'titulo']);
    }

    /**
     * Cria um novo item.
     */
    public function create()
    {

    }

    /**
     * Mostra itens.
     */
    public function show($id)
    {
        $c = is_string($id) ? 0: $id;
        $busca = $this->jogos->find('cod', $c);
        $this->renderView('detalhes', compact('busca'));
    }

    /**
     * Atualiza um item.
     */
    public function update()
    {

    }

    /**
     * Apaga um item.
     */
    public function delete()
    {

    }
}
