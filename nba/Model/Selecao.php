<?php
class Selecao {
    private $conn;
    private $table = "selecoes";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function salvar($dados) {
        $criado_em = date('Y-m-d H:i:s');
        $bandeira = $this->getBandeiraByNome($dados['nome']);

        $query = "INSERT INTO " . $this->table . "
                  (nome, conferencia, divisao, titulos, criado_em, bandeira)
                  VALUES (:nome, :conferencia, :divisao, :titulos, :criado_em, :bandeira)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':conferencia', $dados['conferencia']);
        $stmt->bindParam(':divisao', $dados['divisao']);
        $stmt->bindParam(':titulos', $dados['titulos']);
        $stmt->bindParam(':criado_em', $criado_em);
        $stmt->bindParam(':bandeira', $bandeira);

        return $stmt->execute();
    }

    private function getBandeiraByNome($nome) {
        $nomeLower = strtolower(trim($nome));

        $bandeiras = [
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

        foreach ($bandeiras as $chave => $url) {
            if (strpos($nomeLower, $chave) !== false) {
                return $url;
            }
        }

        return 'https://cdn.nba.com/logos/leagues/logo-nba.svg';
    }

    public function existeNome($nome) {
        $query = "SELECT COUNT(*) FROM {$this->table} WHERE LOWER(nome) = LOWER(:nome)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function atualizarDados($dados) {
        $bandeira = $this->getBandeiraByNome($dados['nome']);

        $query = "UPDATE " . $this->table . "
                  SET nome = :nome, conferencia = :conferencia, divisao = :divisao, titulos = :titulos, bandeira = :bandeira
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':conferencia', $dados['conferencia']);
        $stmt->bindParam(':divisao', $dados['divisao']);
        $stmt->bindParam(':titulos', $dados['titulos']);
        $stmt->bindParam(':bandeira', $bandeira);
        $stmt->bindParam(':id', $dados['id']);

        return $stmt->execute();
    }

    public function buscarPorId($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deletar($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

    public function buscarComFiltro($pagina = 1, $limite = 6, $conferencia = null) {
        $offset = ($pagina - 1) * $limite;
        $where = '';
        $params = [];

        if ($conferencia && $conferencia != 'todos') {
            $where = "WHERE conferencia = :conferencia";
            $params[':conferencia'] = $conferencia;
        }

        $query = "SELECT * FROM {$this->table} $where ORDER BY nome ASC LIMIT :limite OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contarComFiltro($conferencia = null) {
        $where = '';
        $params = [];

        if ($conferencia && $conferencia != 'todos') {
            $where = "WHERE conferencia = :conferencia";
            $params[':conferencia'] = $conferencia;
        }

        $query = "SELECT COUNT(*) FROM {$this->table} $where";
        $stmt = $this->conn->prepare($query);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function listarGrupos() {
        $query = "SELECT DISTINCT conferencia FROM {$this->table} ORDER BY conferencia";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function totalSelecoes() {
        $sql = "SELECT COUNT(*) as total FROM selecoes";
        $stmt = $this->conn->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function totalTitulos() {
        $sql = "SELECT SUM(titulos) as total FROM selecoes";
        $stmt = $this->conn->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function selecoesPorGrupo() {
        $sql = "SELECT conferencia, COUNT(*) as total FROM selecoes GROUP BY conferencia ORDER BY conferencia";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarTodas() {
        $query = "SELECT * FROM selecoes ORDER BY nome ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>