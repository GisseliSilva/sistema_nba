<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elenco do Time NBA</title>
    <link rel="shortcut icon" href="../assets/ball.png" type="image/x-icon">
    <style>
        :root{
            --nba-blue: #1D428A;
            --nba-red: #C8102E;
            --nba-white: #FFFFFF;
            --nba-dark: #0B1624;
            --nba-card: rgba(13, 24, 40, 0.92);
            --nba-border: rgba(255, 255, 255, 0.12);
            --nba-text: #EAF0F8;
            --nba-muted: #AAB7C5;
        }

        *{
            box-sizing: border-box;
        }

        body{
            font-family: Arial, sans-serif;
            min-height: 100vh;
            margin: 0;
            padding: 40px 16px;
            color: var(--nba-text);
            background:
                linear-gradient(135deg, rgba(11, 22, 36, 0.92), rgba(29, 66, 138, 0.78)),
                url('assets/fundo.png') center/cover no-repeat fixed;
        }

        body::before{
            content: "";
            position: fixed;
            inset: 0;
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
            z-index: -1;
        }

        .container{
            width: 100%;
            max-width: 950px;
            margin: 0 auto;
            background: var(--nba-card);
            border: 1px solid var(--nba-border);
            border-radius: 22px;
            padding: 28px;
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.45);
        }

        h1{
            text-align: center;
            color: var(--nba-white);
            margin: 0 0 12px 0;
            font-size: 34px;
            letter-spacing: 0.5px;
        }

        .titulo-time {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            color: var(--nba-white);
            margin-bottom: 12px;
            flex-wrap: wrap;
        }

        .badge{
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(200, 16, 46, 0.16);
            color: var(--nba-white);
            font-weight: bold;
            font-size: 13px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .bandeira {
            width: 40px;
            height: 28px;
            object-fit: cover;
            border-radius: 4px;
        }

        p{
            text-align: center;
            color: var(--nba-muted);
            margin-bottom: 24px;
        }

        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
            overflow: hidden;
            border-radius: 18px;
        }

        th { 
            background: rgba(29, 66, 138, 0.95);
            border: 1px solid rgba(255,255,255,0.08); 
            padding: 15px 10px; 
            color: var(--nba-white);
            font-weight: bold;
            text-align: center;
        }

        td { 
            border: 1px solid rgba(255,255,255,0.08); 
            padding: 12px 10px; 
            background: rgba(255,255,255,0.06);
            color: var(--nba-text);
            text-align: center;
        }

        tr:hover td {
            background-color: rgba(255,255,255,0.09);
        }

        .acoes {
            margin-top: 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 10px 16px;
            background: linear-gradient(135deg, var(--nba-red), #ff3657);
            color: var(--nba-white);
            text-decoration: none;
            border-radius: 999px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.25s;
            border: none;
        }

        .btn:hover {
            transform: translateY(-1px);
            filter: brightness(1.05);
        }

        .btn-secundario {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.22);
        }

        .btn-secundario:hover {
            background: rgba(255,255,255,0.08);
        }

        @media (max-width: 600px) {
            .container{
                padding: 18px;
            }

            h1{
                font-size: 26px;
            }

            table, thead, tbody, th, td, tr{
                font-size: 14px;
            }

            .acoes{
                flex-direction: column;
            }

            .acoes a{
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="badge">NBA Roster</div>
        <h1>Elenco do Time</h1>

        <h2 class="titulo-time">
            <img 
                src="<?= htmlspecialchars($selecao['bandeira'] ?? '') ?>" 
                alt="Logo de <?= htmlspecialchars($selecao['nome'] ?? '') ?>" 
                class="bandeira">
            <span><?= htmlspecialchars($selecao['nome'] ?? '') ?></span>
        </h2>

        <p>
            Conferência: <?= htmlspecialchars($selecao['conferencia'] ?? '') ?> 
            | Divisão: <?= htmlspecialchars($selecao['divisao'] ?? '') ?>
        </p>

        <?php if (empty($jogadores)): ?>
            <p>Nenhum jogador cadastrado para este time.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Posição</th>
                        <th>Número</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jogadores as $j): ?>
                        <tr>
                            <td><?= htmlspecialchars($j['nome']) ?></td>
                            <td><?= htmlspecialchars($j['posicao']) ?></td>
                            <td><?= htmlspecialchars($j['numero_camisa']) ?></td>
                            <td>
                                <a href="index.php?action=editar-jogador&id=<?= $j['id'] ?>" class="btn">Editar</a>
                                <a href="index.php?action=deletar-jogador&id=<?= $j['id'] ?>&selecao_id=<?= $selecao['id'] ?>" class="btn btn-secundario" onclick="return confirm('Tem certeza que deseja excluir este jogador?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <div class="acoes" style="max-width: 950px; margin: 22px auto 0;">
        <a href="index.php" class="btn btn-secundario">Voltar para Times</a>
        <a href="index.php?action=novo-jogador&selecao_id=<?= $selecao['id'] ?>" class="btn">Adicionar Jogador</a>
    </div>
</body>
</html>