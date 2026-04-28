<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jogador</title>
    <link rel="shortcut icon" href="../assets/ball.png" type="image/x-icon">
    <style>
        :root {
            --nba-blue: #1D428A;
            --nba-red: #C8102E;
            --nba-white: #FFFFFF;
            --nba-card: rgba(13, 24, 40, 0.92);
            --nba-border: rgba(255, 255, 255, 0.12);
            --nba-text: #EAF0F8;
            --nba-muted: #AAB7C5;
            --nba-input-bg: rgba(255, 255, 255, 0.07);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            font-family: Arial, sans-serif;
            color: var(--nba-text);
            background:
                linear-gradient(135deg, rgba(11, 22, 36, 0.96), rgba(29, 66, 138, 0.72)),
                url('assets/fundo.png') center/cover no-repeat fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 16px;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            z-index: -1;
        }

        .card {
            width: 100%;
            max-width: 560px;
            background: var(--nba-card);
            border: 1px solid var(--nba-border);
            border-radius: 26px;
            padding: 36px 32px;
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.5);
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 32px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--nba-border);
        }

        .card-header .icone {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--nba-blue), #2a5fd4);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
            box-shadow: 0 6px 16px rgba(29, 66, 138, 0.4);
        }

        .card-header h1 {
            font-size: 22px;
            color: var(--nba-white);
            font-weight: bold;
        }

        .card-header p {
            font-size: 13px;
            color: var(--nba-muted);
            margin-top: 3px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .grupo-campo {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .grupo-linha {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        label {
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: var(--nba-muted);
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 13px 16px;
            border: 1.5px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            font-size: 15px;
            outline: none;
            background: var(--nba-input-bg);
            color: var(--nba-white);
            transition: border-color .2s, box-shadow .2s;
            appearance: none;
            -webkit-appearance: none;
        }

        select option {
            background: #0d1828;
            color: var(--nba-white);
        }

        input:focus,
        select:focus {
            border-color: rgba(29, 66, 138, 0.8);
            box-shadow: 0 0 0 3px rgba(29, 66, 138, 0.25);
        }

        input::placeholder {
            color: rgba(255,255,255,0.25);
        }

        .divider {
            height: 1px;
            background: var(--nba-border);
            margin: 4px 0;
        }

        .acoes {
            display: flex;
            gap: 12px;
            margin-top: 8px;
        }

        .btn-voltar {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 13px 20px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: bold;
            font-size: 15px;
            transition: .25s;
            background: transparent;
            border: 1.5px solid rgba(255,255,255,0.18);
            color: var(--nba-white);
            cursor: pointer;
            flex: 1;
        }

        .btn-voltar:hover {
            background: rgba(255,255,255,0.07);
        }

        .btn-salvar {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 13px 20px;
            border-radius: 999px;
            font-weight: bold;
            font-size: 15px;
            transition: .25s;
            background: linear-gradient(135deg, var(--nba-blue), #2a5fd4);
            color: var(--nba-white);
            border: none;
            cursor: pointer;
            flex: 2;
            box-shadow: 0 8px 20px rgba(29, 66, 138, 0.4);
        }

        .btn-salvar:hover {
            transform: translateY(-1px);
            filter: brightness(1.08);
        }

        @media (max-width: 500px) {
            .card { padding: 24px 18px; }
            .grupo-linha { grid-template-columns: 1fr; }
            .acoes { flex-direction: column; }
            .btn-salvar, .btn-voltar { flex: unset; width: 100%; }
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <div>
                <h1>Editar Jogador</h1>
                <p>Atualize as informações do jogador</p>
            </div>
        </div>

        <form action="index.php?action=atualizar-jogador" method="post">
            <input type="hidden" name="id" value="<?= $jogador['id'] ?>">

            <div class="grupo-campo">
                <label>Nome completo</label>
                <input type="text" name="nome" value="<?= htmlspecialchars($jogador['nome']) ?>" placeholder="Ex: LeBron James" required>
            </div>

            <div class="grupo-linha">
                <div class="grupo-campo">
                    <label>Posição</label>
                    <input type="text" name="posicao" value="<?= htmlspecialchars($jogador['posicao']) ?>" placeholder="Ex: Ala" required>
                </div>
                <div class="grupo-campo">
                    <label>Nº da Camisa</label>
                    <input type="number" name="numero_camisa" min="1" max="99" value="<?= htmlspecialchars($jogador['numero_camisa']) ?>" placeholder="Ex: 23" required>
                </div>
            </div>

            <div class="divider"></div>

            <div class="grupo-campo">
                <label>Time / Seleção</label>
                <select name="selecao_id" required>
                    <option value="">Selecione um time</option>
                    <?php foreach ($todasSelecoes as $s): ?>
                        <option value="<?= $s['id'] ?>" <?= $jogador['selecao_id'] == $s['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($s['nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="acoes">
                <a href="index.php" class="btn-voltar">Voltar</a>
                <button type="submit" class="btn-salvar">Salvar Alterações</button>
            </div>
        </form>
    </div>
</body>
</html>