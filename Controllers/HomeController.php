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
    public function index(Request $request): void
    {
        $ordem = $request->has('o')->get()->o ?? 'n';
        $chave = $request->has('c')->get()->c ?? '';
        $q = '';
        $bind = [];

        if (!empty($chave)) {
            $bind = ["%$chave%", "%$chave%", "%$chave%"];
            $q = "WHERE j.nome LIKE ? OR p.produtora LIKE ? OR g.genero LIKE ? ";
        }

        switch ($ordem) {
            case 'p':
                $q .= "ORDER BY p.produtora ";
                break;
            case 'n1':
                $q .= "ORDER BY j.nota DESC ";
                break;
            case 'n2':
                $q .= "ORDER BY j.nota ASC ";
                break;
            default:
                $q .= "ORDER BY j.nome ";
                break;
        }

        $busca = $this->jogos->joinTables($q, $bind);
        $this->renderView('index', compact('busca'), compact('chave'));
    }

    private function renderView(string $view, array ...$params) {
        $this->render($view, ...$params)
        ->templete('view', 'templete')
        ->assets(['css' => 'estilo'])
        ->components(['titulo' => 'titulo', 'rodape' => 'rodape', 'topo' => 'topo']);
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
    public function show($id): void
    {
        $c = is_numeric($id) ? (int) $id: 0;
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
