<?php 
require_once './Model/Selecao.php';
require_once './config/Database.php';

class SelecaoController {
    private $db;
    private $selecoes;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->selecoes = new Selecao($this->db);
    }

    public function salvar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dados = [
                'nome' => htmlspecialchars(trim($_POST['nome']), ENT_QUOTES, 'UTF-8'),
                'conferencia' => htmlspecialchars(trim($_POST['conferencia']), ENT_QUOTES, 'UTF-8'),
                'divisao' => htmlspecialchars(trim($_POST['divisao']), ENT_QUOTES, 'UTF-8'),
                'titulos' => (int) $_POST['titulos']
            ];

            if (empty($dados['nome']) || empty($dados['conferencia']) || empty($dados['divisao'])) {
                header("Location: index.php?action=novo&status=erro&msg=" . urlencode("Preencha todos os campos!"));
                exit;
            }

            if ($this->selecoes->existeNome($dados['nome'])) {
                header("Location: index.php?action=novo&status=erro&msg=" . urlencode("Time já cadastrado!"));
                exit;
            }

            $dados['bandeira'] = $this->buscarBandeira($dados['nome']);

            if ($this->selecoes->salvar($dados)) {
                header("Location: index.php?status=sucesso&msg=" . urlencode("Time cadastrado com sucesso!"));
                exit;
            } else {
                header("Location: index.php?action=novo&status=erro&msg=" . urlencode("Erro ao salvar"));
                exit;
            }
        }
    }

    private function buscarBandeira($nomeSelecao) {
        $timesMap = [
            'boston celtics' => 'https://cdn.nba.com/logos/nba/1610612738/global/L/logo.svg',
            'celtics' => 'https://cdn.nba.com/logos/nba/1610612738/global/L/logo.svg',
            'brooklyn nets' => 'https://cdn.nba.com/logos/nba/1610612751/global/L/logo.svg',
            'nets' => 'https://cdn.nba.com/logos/nba/1610612751/global/L/logo.svg',
            'new york knicks' => 'https://cdn.nba.com/logos/nba/1610612752/global/L/logo.svg',
            'knicks' => 'https://cdn.nba.com/logos/nba/1610612752/global/L/logo.svg',
            'philadelphia 76ers' => 'https://cdn.nba.com/logos/nba/1610612755/global/L/logo.svg',
            '76ers' => 'https://cdn.nba.com/logos/nba/1610612755/global/L/logo.svg',
            'toronto raptors' => 'https://cdn.nba.com/logos/nba/1610612761/global/L/logo.svg',
            'raptors' => 'https://cdn.nba.com/logos/nba/1610612761/global/L/logo.svg',
            'chicago bulls' => 'https://cdn.nba.com/logos/nba/1610612741/global/L/logo.svg',
            'bulls' => 'https://cdn.nba.com/logos/nba/1610612741/global/L/logo.svg',
            'cleveland cavaliers' => 'https://cdn.nba.com/logos/nba/1610612739/global/L/logo.svg',
            'cavaliers' => 'https://cdn.nba.com/logos/nba/1610612739/global/L/logo.svg',
            'cavs' => 'https://cdn.nba.com/logos/nba/1610612739/global/L/logo.svg',
            'detroit pistons' => 'https://cdn.nba.com/logos/nba/1610612765/global/L/logo.svg',
            'pistons' => 'https://cdn.nba.com/logos/nba/1610612765/global/L/logo.svg',
            'indiana pacers' => 'https://cdn.nba.com/logos/nba/1610612754/global/L/logo.svg',
            'pacers' => 'https://cdn.nba.com/logos/nba/1610612754/global/L/logo.svg',
            'milwaukee bucks' => 'https://cdn.nba.com/logos/nba/1610612749/global/L/logo.svg',
            'bucks' => 'https://cdn.nba.com/logos/nba/1610612749/global/L/logo.svg',
            'atlanta hawks' => 'https://cdn.nba.com/logos/nba/1610612737/global/L/logo.svg',
            'hawks' => 'https://cdn.nba.com/logos/nba/1610612737/global/L/logo.svg',
            'charlotte hornets' => 'https://cdn.nba.com/logos/nba/1610612766/global/L/logo.svg',
            'hornets' => 'https://cdn.nba.com/logos/nba/1610612766/global/L/logo.svg',
            'miami heat' => 'https://cdn.nba.com/logos/nba/1610612748/global/L/logo.svg',
            'heat' => 'https://cdn.nba.com/logos/nba/1610612748/global/L/logo.svg',
            'orlando magic' => 'https://cdn.nba.com/logos/nba/1610612753/global/L/logo.svg',
            'magic' => 'https://cdn.nba.com/logos/nba/1610612753/global/L/logo.svg',
            'washington wizards' => 'https://cdn.nba.com/logos/nba/1610612764/global/L/logo.svg',
            'wizards' => 'https://cdn.nba.com/logos/nba/1610612764/global/L/logo.svg',
            'denver nuggets' => 'https://cdn.nba.com/logos/nba/1610612743/global/L/logo.svg',
            'nuggets' => 'https://cdn.nba.com/logos/nba/1610612743/global/L/logo.svg',
            'minnesota timberwolves' => 'https://cdn.nba.com/logos/nba/1610612750/global/L/logo.svg',
            'timberwolves' => 'https://cdn.nba.com/logos/nba/1610612750/global/L/logo.svg',
            'oklahoma city thunder' => 'https://cdn.nba.com/logos/nba/1610612760/global/L/logo.svg',
            'thunder' => 'https://cdn.nba.com/logos/nba/1610612760/global/L/logo.svg',
            'portland trail blazers' => 'https://cdn.nba.com/logos/nba/1610612757/global/L/logo.svg',
            'blazers' => 'https://cdn.nba.com/logos/nba/1610612757/global/L/logo.svg',
            'utah jazz' => 'https://cdn.nba.com/logos/nba/1610612762/global/L/logo.svg',
            'jazz' => 'https://cdn.nba.com/logos/nba/1610612762/global/L/logo.svg',
            'golden state warriors' => 'https://cdn.nba.com/logos/nba/1610612744/global/L/logo.svg',
            'warriors' => 'https://cdn.nba.com/logos/nba/1610612744/global/L/logo.svg',
            'los angeles clippers' => 'https://cdn.nba.com/logos/nba/1610612746/global/L/logo.svg',
            'clippers' => 'https://cdn.nba.com/logos/nba/1610612746/global/L/logo.svg',
            'los angeles lakers' => 'https://cdn.nba.com/logos/nba/1610612747/global/L/logo.svg',
            'lakers' => 'https://cdn.nba.com/logos/nba/1610612747/global/L/logo.svg',
            'phoenix suns' => 'https://cdn.nba.com/logos/nba/1610612756/global/L/logo.svg',
            'suns' => 'https://cdn.nba.com/logos/nba/1610612756/global/L/logo.svg',
            'sacramento kings' => 'https://cdn.nba.com/logos/nba/1610612758/global/L/logo.svg',
            'kings' => 'https://cdn.nba.com/logos/nba/1610612758/global/L/logo.svg',
            'dallas mavericks' => 'https://cdn.nba.com/logos/nba/1610612742/global/L/logo.svg',
            'mavericks' => 'https://cdn.nba.com/logos/nba/1610612742/global/L/logo.svg',
            'mavs' => 'https://cdn.nba.com/logos/nba/1610612742/global/L/logo.svg',
            'houston rockets' => 'https://cdn.nba.com/logos/nba/1610612745/global/L/logo.svg',
            'rockets' => 'https://cdn.nba.com/logos/nba/1610612745/global/L/logo.svg',
            'memphis grizzlies' => 'https://cdn.nba.com/logos/nba/1610612763/global/L/logo.svg',
            'grizzlies' => 'https://cdn.nba.com/logos/nba/1610612763/global/L/logo.svg',
            'new orleans pelicans' => 'https://cdn.nba.com/logos/nba/1610612740/global/L/logo.svg',
            'pelicans' => 'https://cdn.nba.com/logos/nba/1610612740/global/L/logo.svg',
            'san antonio spurs' => 'https://cdn.nba.com/logos/nba/1610612759/global/L/logo.svg',
            'spurs' => 'https://cdn.nba.com/logos/nba/1610612759/global/L/logo.svg',
        ];

        $nomeLower = mb_strtolower(trim($nomeSelecao), 'UTF-8');

        foreach ($timesMap as $time => $url) {
            if (strpos($nomeLower, $time) !== false) {
                return $url;
            }
        }

        return 'https://cdn.nba.com/logos/leagues/logo-nba.svg';
    }

    public function criar() {
        require_once './Views/create.php';
    }

    public function editar($id) {
        $time = $this->selecoes->buscarPorId($id);
        if ($time) {
            require_once './Views/edit.php';
        } else {
            header("Location: index.php?status=erro&msg=Time não encontrado");
            exit;
        }
    }

    public function atualizarDados() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'id' => (int)$_POST['id'],
                'nome' => htmlspecialchars(trim($_POST['nome']), ENT_QUOTES, 'UTF-8'),
                'conferencia' => htmlspecialchars(trim($_POST['conferencia']), ENT_QUOTES, 'UTF-8'),
                'divisao' => htmlspecialchars(trim($_POST['divisao']), ENT_QUOTES, 'UTF-8'),
                'titulos' => (int) $_POST['titulos']
            ];

            if ($this->selecoes->atualizarDados($dados)) {
                header("Location: index.php?status=sucesso&msg=Atualizado!");
                exit;
            }

            header("Location: index.php?status=erro&msg=Erro ao atualizar!");
            exit;
        }
    }

    public function deletar($id) {
        if ($this->selecoes->deletar($id)) {
            header("Location: index.php?status=sucesso&msg=Excluído!");
            exit;
        }
    }

    public function index() {
        $pagina = isset($_GET['p']) ? max(1, (int) $_GET['p']) : 1;
        $limite = 6;
        $grupo = isset($_GET['grupo']) ? trim($_GET['grupo']) : '';

        $times = $this->selecoes->buscarComFiltro($pagina, $limite, $grupo);
        $total = $this->selecoes->contarComFiltro($grupo);
        $totalPaginas = ceil($total / $limite);
        $grupos = $this->selecoes->listarGrupos();

        $dashboardTotalSelecoes = $this->selecoes->totalSelecoes();
        $dashboardTotalTitulos = $this->selecoes->totalTitulos();
        $dashboardPorGrupo = $this->selecoes->selecoesPorGrupo();

        require './Views/lista.php';
    }

    public function dashboard() {
        $dashboardTotalSelecoes = $this->selecoes->totalSelecoes();
        $dashboardTotalTitulos = $this->selecoes->totalTitulos();
        $dashboardPorGrupo = $this->selecoes->selecoesPorGrupo();

        require_once './Views/dashboard.php';
    }
}
?>