<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Times NBA</title>
    <link rel="shortcut icon" href="../assets/ball.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --blue:    #1D428A;
            --red:     #C8102E;
            --white:   #FFFFFF;
            --dark:    #080F1C;
            --card:    rgba(12, 22, 38, 0.88);
            --border:  rgba(255,255,255,0.09);
            --text:    #E8EFF8;
            --muted:   #7A90A8;
            --accent:  #2a5fd4;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            font-family: 'DM Sans', sans-serif;
            color: var(--text);
            background: var(--dark);
            background-image:
                radial-gradient(ellipse 80% 60% at 10% 0%, rgba(29,66,138,0.35) 0%, transparent 60%),
                radial-gradient(ellipse 60% 50% at 90% 100%, rgba(200,16,46,0.18) 0%, transparent 55%);
            padding: 36px 20px 60px;
        }

        /* CONTAINER */
        .container {
            max-width: 1240px;
            margin: 0 auto;
        }

        /* HEADER */
        header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 40px;
            padding-bottom: 28px;
            border-bottom: 1px solid var(--border);
        }

        .header-left {}

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--red);
            margin-bottom: 10px;
        }

        .eyebrow::before {
            content: '';
            width: 22px; height: 2px;
            background: var(--red);
            border-radius: 2px;
        }

        .eyebrow::after {
            content: '';
            width: 22px; height: 2px;
            background: var(--red);
            border-radius: 2px;
        }

        h1 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(38px, 5vw, 58px);
            line-height: 1;
            color: var(--white);
            letter-spacing: 1px;
        }

        h1 span { color: var(--red); }

        .header-right {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            align-items: center;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 24px;
            border-radius: 12px;
            background: var(--red);
            color: var(--white);
            font-family: 'DM Sans', sans-serif;
            font-weight: 700;
            font-size: 14px;
            text-decoration: none;
            transition: .2s;
            box-shadow: 0 8px 24px rgba(200,16,46,0.3);
        }

        .btn-primary:hover { filter: brightness(1.1); transform: translateY(-1px); }

        .btn-ghost {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 22px;
            border-radius: 12px;
            background: transparent;
            border: 1.5px solid var(--border);
            color: var(--muted);
            font-family: 'DM Sans', sans-serif;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            transition: .2s;
        }

        .btn-ghost:hover { border-color: rgba(255,255,255,0.25); color: var(--white); }

        /* STATS STRIP */
        .stats-strip {
            display: flex;
            gap: 16px;
            margin-bottom: 32px;
            flex-wrap: wrap;
        }

        .stat-card {
            flex: 1;
            min-width: 140px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 18px 22px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .stat-card .stat-val {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 36px;
            color: var(--white);
            line-height: 1;
        }

        .stat-card .stat-lbl {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--muted);
        }

        .stat-card.red .stat-val { color: var(--red); }
        .stat-card.blue .stat-val { color: #60a5fa; }

        /* FILTRO */
        .filtro-box {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
            margin-bottom: 28px;
        }

        .filtro-label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--muted);
            white-space: nowrap;
        }

        .filtro-pills { display: flex; gap: 8px; flex-wrap: wrap; }

        .pill {
            padding: 8px 18px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            border: 1.5px solid var(--border);
            background: rgba(255,255,255,0.04);
            color: var(--muted);
            transition: all .18s;
        }

        .pill:hover {
            background: rgba(255,255,255,0.09);
            color: var(--white);
            border-color: rgba(255,255,255,0.2);
        }

        .pill.ativo {
            background: var(--blue);
            color: var(--white);
            border-color: transparent;
            box-shadow: 0 4px 16px rgba(29,66,138,0.45);
        }

        /* TABELA */
        .table-wrap {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            overflow: hidden;
        }

        table { width: 100%; border-collapse: collapse; }

        thead th {
            background: rgba(29,66,138,0.6);
            color: var(--muted);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid var(--border);
        }

        thead th:not(:first-child) { text-align: center; }

        tbody td {
            padding: 14px 16px;
            font-size: 14px;
            border-bottom: 1px solid var(--border);
            color: var(--text);
            text-align: center;
            vertical-align: middle;
        }

        tbody td:first-child { text-align: left; }
        tbody tr:last-child td { border-bottom: none; }

        tbody tr {
            transition: background .15s;
        }

        tbody tr:hover td { background: rgba(255,255,255,0.04); }

        .time-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-wrap {
            width: 40px; height: 40px;
            background: rgba(255,255,255,0.06);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .logo-wrap img {
            width: 28px; height: 28px;
            object-fit: contain;
        }

        .time-nome { font-weight: 700; font-size: 14px; color: var(--white); }

        .badge {
            display: inline-block;
            padding: 4px 11px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            background: rgba(29,66,138,0.35);
            color: #60a5fa;
            border: 1px solid rgba(29,66,138,0.5);
        }

        .badge.east { background: rgba(200,16,46,0.2); color: #f87171; border-color: rgba(200,16,46,0.35); }

        .titulos-val {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 22px;
            color: var(--white);
        }

        .date-val { color: var(--muted); font-size: 13px; }

        /* AÇÕES */
        .acoes { display: flex; justify-content: center; gap: 6px; flex-wrap: wrap; }

        .btn-sm {
            padding: 7px 14px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            color: var(--white);
            transition: .18s;
            white-space: nowrap;
        }

        .btn-sm:hover { filter: brightness(1.12); transform: translateY(-1px); }
        .btn-editar { background: rgba(29,66,138,0.7); border: 1px solid rgba(29,66,138,0.8); }
        .btn-excluir { background: rgba(200,16,46,0.7); border: 1px solid rgba(200,16,46,0.8); }
        .btn-elenco { background: rgba(255,255,255,0.08); border: 1px solid var(--border); }

        /* VAZIO */
        .vazio {
            text-align: center;
            padding: 60px 20px;
            color: var(--muted);
        }

        .vazio-icon { font-size: 48px; margin-bottom: 12px; }
        .vazio h3 { color: var(--white); font-size: 20px; margin-bottom: 8px; }
        .vazio a { color: #60a5fa; text-decoration: none; }

        /* PAGINAÇÃO */
        .paginacao {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 28px;
        }

        .paginacao a {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 11px 22px;
            border-radius: 12px;
            text-decoration: none;
            background: var(--card);
            border: 1px solid var(--border);
            color: var(--text);
            font-weight: 600;
            font-size: 14px;
            transition: .18s;
        }

        .paginacao a:hover {
            border-color: rgba(255,255,255,0.22);
            color: var(--white);
        }

        .pag-info {
            font-size: 13px;
            color: var(--muted);
            padding: 0 8px;
        }

        /* ALERTA */
        .alerta {
            padding: 14px 20px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alerta.sucesso { background: rgba(34,197,94,0.15); border: 1px solid rgba(34,197,94,0.3); color: #86efac; }
        .alerta.erro { background: rgba(200,16,46,0.15); border: 1px solid rgba(200,16,46,0.3); color: #fca5a5; }

        @media (max-width: 768px) {
            header { flex-direction: column; align-items: flex-start; }
            .header-right { width: 100%; }
            .btn-primary, .btn-ghost { flex: 1; justify-content: center; }
            .stats-strip { display: grid; grid-template-columns: 1fr 1fr; }
            table { font-size: 13px; }
            thead th, tbody td { padding: 10px 10px; }
        }
    </style>
</head>
<body>
    <div class="container">

        <!-- HEADER -->
        <header>
            <div class="header-left">
                <div class="eyebrow">NBA · Temporada 2024-25</div>
                <h1>Times da <span>Liga</span></h1>
            </div>
            <div class="header-right">
                <a href="index.php?action=novo" class="btn-primary">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    Cadastrar Time
                </a>
                <a href="index.php?action=dashboard" class="btn-ghost">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                    Dashboard
                </a>
            </div>
        </header>

        <!-- FILTRO -->
        <div class="filtro-box">
            <span class="filtro-label">Conferência</span>
            <div class="filtro-pills">
                <a href="?grupo=" class="pill <?= empty($grupo) ? 'ativo' : '' ?>">Todas</a>
                <?php foreach ($grupos as $g): ?>
                    <a href="?grupo=<?= urlencode($g) ?>" class="pill <?= $grupo === $g ? 'ativo' : '' ?>">
                        <?= htmlspecialchars($g) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- TABELA -->
        <?php if (empty($times)): ?>
            <div class="table-wrap">
                <div class="vazio">
                    <div class="vazio-icon">🏀</div>
                    <h3>Nenhum time encontrado</h3>
                    <p>Tente outro filtro ou <a href="index.php?action=novo">cadastre um time</a>.</p>
                </div>
            </div>
        <?php else: ?>
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Conferência</th>
                            <th>Divisão</th>
                            <th>Títulos</th>
                            <th>Cadastrado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($times as $time): ?>
                        <tr>
                            <td>
                                <div class="time-cell">
                                    <div class="logo-wrap">
                                        <?php if (!empty($time['bandeira'])): ?>
                                            <img src="<?= htmlspecialchars($time['bandeira']) ?>" alt="Logo">
                                        <?php else: ?>
                                            🏀
                                        <?php endif; ?>
                                    </div>
                                    <span class="time-nome"><?= htmlspecialchars($time['nome']) ?></span>
                                </div>
                            </td>
                            <td>
                                <?php
                                    $conf = htmlspecialchars($time['conferencia'] ?? '');
                                    $isEast = stripos($conf, 'east') !== false || stripos($conf, 'leste') !== false;
                                ?>
                                <span class="badge <?= $isEast ? 'east' : '' ?>"><?= $conf ?></span>
                            </td>
                            <td><?= htmlspecialchars($time['divisao'] ?? '—') ?></td>
                            <td><span class="titulos-val"><?= (int)$time['titulos'] ?></span></td>
                            <td><span class="date-val"><?= date('d/m/Y', strtotime($time['criado_em'])) ?></span></td>
                            <td>
                                <div class="acoes">
                                    <a href="index.php?action=editar&id=<?= $time['id'] ?>" class="btn-sm btn-editar">Editar</a>
                                    <a href="index.php?action=deletar&id=<?= $time['id'] ?>" class="btn-sm btn-excluir"
                                       onclick="return confirm('Excluir <?= htmlspecialchars($time['nome']) ?>?')">Excluir</a>
                                    <a href="index.php?action=elenco&selecao_id=<?= $time['id'] ?>" class="btn-sm btn-elenco">Elenco</a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <!-- PAGINAÇÃO -->
        <?php
            $mostraProxima  = count($times) == 6 && $pagina < $totalPaginas;
            $mostraAnterior = $pagina > 1;
        ?>
        <?php if ($mostraProxima || $mostraAnterior): ?>
            <div class="paginacao">
                <?php if ($mostraAnterior): ?>
                    <a href="?p=<?= $pagina - 1 ?>&grupo=<?= urlencode($grupo) ?>">
                        Anterior
                    </a>
                <?php endif; ?>
                <span class="pag-info">Página <?= $pagina ?> de <?= $totalPaginas ?></span>
                <?php if ($mostraProxima): ?>
                    <a href="?p=<?= $pagina + 1 ?>&grupo=<?= urlencode($grupo) ?>">
                        Próxima
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>
</body>
</html>